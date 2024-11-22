<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hotel;
use App\Models\Booking;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function dashboard()
    {
        $totalUsers = User::count();
        $totalHotels = Hotel::count();
        $totalBookings = Booking::count();
        
        return view('admin.dashboard', compact('totalUsers', 'totalHotels', 'totalBookings'));
    }
}
