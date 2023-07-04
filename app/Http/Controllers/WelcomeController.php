<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Models\Doctor;
use App\Models\User;

class WelcomeController extends Controller
{
    public function index()
    {
        $specializations = Specialization::all();
        return view('welcome', compact('specializations'));
    }

    public function show(Request $request)
    {
        $request->validate([
            'specializations' => ['required', 'numeric'],
        ]);
        
        $specialization_id_selected = $request->request->get('specializations');
        $specialization = Specialization::find($specialization_id_selected);
        $doctors_id_specializations = $specialization->doctors->pluck('id')->toArray();
        $doctors = [];
        $users = [];
        foreach ($doctors_id_specializations as $id) {
            array_push($doctors, Doctor::find($id));
            array_push($users, User::find($id));
        }

        $specializations = Specialization::all();

        return view('welcome', compact('doctors','users', 'specializations'));
    }
}
