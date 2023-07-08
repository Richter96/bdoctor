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

        // doctor_ua = doctor with user_field and average_vote field
        $doctors_ua = Doctor::select(
            'doctors.id',
            'name',
            'lastname',
            'slug',
            'email',
            'phone',
            'photo',
            'cv',
            'service',
            Doctor::raw('AVG(votes.vote) as avgVote')
        )
            ->join('doctor_vote', 'doctors.id', '=', 'doctor_vote.doctor_id')
            ->join('votes', 'doctor_vote.vote_id', '=', 'votes.id')
            ->join('users', 'doctors.id', '=', 'users.id')
            ->groupBy('doctors.id')
            ->get();

        $specializations = Specialization::all();

        return view('welcome', compact('doctors_ua', 'specializations'));
    }
}
