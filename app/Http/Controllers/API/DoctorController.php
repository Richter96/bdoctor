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
    public function index()
    {

        $doctors = Doctor::with(['specializations'])->get();

        return response()->json([
            'success' => true,
            'doctors' => $doctors,
            'user' => User::all(),
        ]);
    }


    public function show($slug)
    {
        $doctor = Doctor::with(['specializations'])->where('slug', $slug)->first();
        $user_id = $doctor->id;
        $user = User::find($user_id);

        if ($doctor) {

            return response()->json([
                'success' => true,
                'result' => $doctor,
                'user' => $user,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'result' => 'doctor not found 404',
            ]);
        }
    }

    public function showBySpecialization($specialization_id)
    {

        $specialization = Specialization::find($specialization_id);
        if ($specialization) {

            $doctors_id_specializations = $specialization->doctors->pluck('id')->toArray();
            $doctors = [];
            $users = [];
            foreach ($doctors_id_specializations as $id) {
                array_push($doctors, Doctor::with(['specializations'])->find($id));
                array_push($users, User::find($id));
            }

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

    public function avgVotesByDoc()
    {
        /*$avgVotes = Doctor::table('doctors')->select('doc')->join('doctor_vote', 'doctor.id', '=', 'doctor_vote.doctor_id')->join('votes', 'votes.id', '=', 'doctor_vote.vote_id')->where('doctor.id', $doctor_id)->avg('votes.vote');
        echo($avgVotes); */
        Doctor::table('doctors')
            ->select('doctors.id as doctor_id', Doctor::raw("'AVG'('votes.vote') as avgVote"))
            ->join('doctor_vote', 'doctors.id', '=', 'doctor_vote.doctor_id')
            ->join('votes', 'doctor_vote.vote_id', '=', 'votes.id')
            ->groupBy('doctors.id')
            ->get();
    }
}
