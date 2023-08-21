<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ComplaintRequest;
use App\Models\Complaint;
use App\Models\ComplaintPhoto;
use App\Models\ComplaintStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $complaints = Complaint::with('complaintStatus')->where('user_id', Auth::id())->get();
        return view('user.view-complaint', compact('complaints'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.file-complaint');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ComplaintRequest $request)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            $newComplaint = [
                'address' => $data['address'],
                'description' => $data['description'],
                'type' => $data['type'],
            ];
            $complaint = Auth::user()->complaints()->create($newComplaint);
            $complaintStatus = new ComplaintStatus([
                'status' => "pending"
            ]);
            $complaint->complaintStatus()->save($complaintStatus);
            $photos = [];
            if ($request->hasFile('photo')) {
                foreach ($request->file('photo') as $photo) {
                    $path = $photo->store('photos', 'public'); // Store image in 'public/photos' directory
                    $photos[] = ['path' => $path];
                }
            }

            $complaint->complaintPhotos()->createMany($photos);

            DB::commit();
            return to_route('complaint.index');
        } catch (\Throwable $throwable) {
            DB::rollBack();
            return back()->withInput($request->all())->withErrors(['errorMsg' => 'Unknown Error Occurred' . $throwable->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $complaint = Complaint::with('complaintStatus')->with('user')->with('complaintPhotos')->where('id', $id)->first();
        return view('user.view-one-complaint', compact('complaint'));
    }

}
