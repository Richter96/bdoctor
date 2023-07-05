<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Specialization;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function index() {

        $doctors = Doctor::with(['specializations'])->get();

        return response()->json([
            'success' => true,
            'doctors' => $doctors,
            'user'=>User::all(),
        ]);

    }


public function show($slug)
{
    // dd($slug);
    $doctor = Doctor::with(['specializations'])->where('slug', $slug)->first();
    $user_id = $doctor->id;
    $userDetail = User::find($user_id);
    // dd($userDetail);

    if ($doctor) {

        return response()->json([
            'success' => true,
            'result' => $doctor,
            'user' => $userDetail,
        ]);

    } else {
        return response()->json([
            'success' => false,
            'result' => 'doctor not found 404',
        ]);
    }

    }
}
