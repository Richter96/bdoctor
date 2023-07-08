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
        $request->validate(['spec_selected' => ['required', 'numeric'],]);
        $specializations = Specialization::all();
        $spec_selected = $request->spec_selected; // Only to show last selected spec

        // docs_info = an array of doctor with user-info and avgVote
        $docs_info = Doctor::select(
            'doctors.id',
            'users.name AS name',
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
            ->join('doctor_specialization', 'doctors.id', '=', 'doctor_specialization.doctor_id')
            ->join('specializations', 'doctor_specialization.specialization_id', '=', 'specializations.id')
            ->join('users', 'doctors.id', '=', 'users.id')
            ->where('specializations.id', '=', $spec_selected)
            ->groupBy('doctors.id')
            ->get();

        return view('welcome', compact('docs_info', 'specializations', 'spec_selected'));
    }
}
