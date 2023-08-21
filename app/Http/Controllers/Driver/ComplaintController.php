<?php

namespace App\Http\Controllers\Driver;

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
        $complaints = Complaint::with('complaintStatus')
            ->whereHas('assignedTo', fn($query) => $query->where('driver', Auth::id()))
            ->with('user')->get();
        return view('driver.view-all', compact('complaints'));
    }


    public function viewOne(string $id)
    {
        $complaint = Complaint::with(['complaintStatus' => fn($query) => $query->with('user')->with(['complaintAssignedTo' => fn($query) => $query->latest()])])
            ->with('user')
            ->with('complaintPhotos')
            ->where('id', $id)
            ->first();
        return view('driver.view-one-complaint', compact('complaint'));
    }

    public function accept($id)
    {
        $complaint = ComplaintAssignedTo::findOrFail($id);
        $complaint->status = "accepted";
        $complaint->save();
        return to_route('driver.complaint.show', $complaint->complaintStatus->complaint_id);
    }

    public function reject($id)
    {
        $complaint = ComplaintAssignedTo::findOrFail($id);
        $complaint->status = "rejected";
        $complaint->save();

        $complaint->complaintStatus->status = "pending";
        $complaint->complaintStatus->assigned_by = null;
        $complaint->complaintStatus->save();
        return to_route('dashboard');
    }

    public function completed($id)
    {
        $complaint = ComplaintAssignedTo::findOrFail($id);
        $complaint->status = "completed";
        $complaint->save();
        $complaint->complaintStatus->status = "completed";
        $complaint->complaintStatus->save();
        return to_route('driver.complaint.show', $complaint->complaintStatus->complaint_id);
    }

}
