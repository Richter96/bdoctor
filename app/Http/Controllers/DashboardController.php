<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {        
        $user_id = Auth::id();
        $doctor = Doctor::find($user_id);
        return view('dashboard', compact('doctor'));  // $doctor Serve per far funzionare la sidebar
    }
}
