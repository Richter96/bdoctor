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

    public function showBySpecialization($specialization_id) {

        $specialization = Specialization::find($specialization_id);
        if($specialization) {

            $doctors_id_specializations = $specialization->doctors->pluck('id')->toArray();
            $doctors = [];
            $users = [];
            foreach ($doctors_id_specializations as $id) {
                array_push($doctors, Doctor::with(['specializations'])->find($id));
                array_push($users, User::find($id));
            }

            $specializations = Specialization::all();

            if ($doctors) {

                return response()->json([
                    'success' => true,
                    'result' => $doctors,
                    'users' => $users,
                ]);

            } else {
                return response()->json([
                    'success' => false,
                    'result' => 'doctor not found 404',
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'result' => 'specialization not found 404',
            ]);
        }
    }
}