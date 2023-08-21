<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\ComplaintAssignedTo;
use App\Models\ComplaintStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function viewAll()
    {
        $complaints =  Complaint::with('complaintStatus')->with('user')->get();
        return view('admin.view-all', compact('complaints'));
    }


    public function viewOne(string $id)
    {
        $complaint = Complaint::with(['complaintStatus' => fn($query) => $query->with('user')->with('complaintAssignedTo')])->with('user')->with('complaintPhotos')->where('id', $id)->first();
        $drivers = User::where('role', 'driver')->get();
        $driverArray = $drivers->mapWithKeys(function ($driver) {
            return [$driver->id => $driver->name];
        })->all();

        return view('admin.view-one-complaint', compact('complaint', 'driverArray'));
    }

    public function assign(Request $request, string $id)
    {
        $complaint = ComplaintStatus::where('complaint_id', $id)->first();

        $complaint->status = 'onProcess';
        $complaint->assigned_by = Auth::id();
        $complaint->save();
        $driver = new ComplaintAssignedTo([
            'driver' => $request->driver,
            'status' => 'pending'
        ]);
        $complaint->complaintAssignedTo()->save($driver);
        return to_route('admin.complaint.show', $id);
    }
}
