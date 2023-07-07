<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Vote;
use Illuminate\Support\Facades\Validator;

class VoteController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

       $validator = Validator::make($data, [
            'vote' => 'required',
            'doctor_id' => 'numeric',
        ]);

        $doctor = Doctor::find($request->doctor_id);
        $vote = Vote::find($request->vote); // Dovrebbe essere vote_id ma fortunatamente vote e vote_id sono in corrispondenza biunivoca

        $doctor->votes()->attach($vote);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        return response()->json([
            'success' => true,
        ]);
    }}
