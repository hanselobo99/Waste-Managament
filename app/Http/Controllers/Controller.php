<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function index()
    {
        if (Auth::user()->role == 'admin') {
            $complaints = Complaint::with('complaintPhotos')
                ->whereHas('complaintStatus', function ($query) {
                    $query->where('status', 'pending');
                })->with('user')
                ->with('complaintPhotos')
                ->get();
            return view('admin/dashboard', compact('complaints'));
        } else if (Auth::user()->role == 'driver') {
            $complaints = Complaint::with('complaintPhotos')->with('complaintStatus')->with('assignedTo')
                ->whereHas('assignedTo', function ($query) {
                    return $query->where('complaint_assigned_tos.driver', Auth::id())->where('complaint_assigned_tos.status','pending');
                })->with('user')
                ->with('complaintPhotos')
                ->get();
            return view('driver/dashboard', compact('complaints'));
        } else {
            $complaints = Complaint::with('complaintPhotos')
                ->whereHas('complaintStatus', function ($query) {
                    $query->where('status', 'pending');
                })->with('user')
                ->with('complaintPhotos')
                ->where('user_id', Auth::id())
                ->get();
            return view('user/dashboard', compact('complaints'));
        }
    }
}
