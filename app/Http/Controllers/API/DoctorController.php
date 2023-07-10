<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index()
    {
        $docs_info = $this
            ->getDocsInfo()
            ->get();

        return response()->json([
            'success' => true,
            'doc_info' => $docs_info
        ]);
    }

    public function show($slug)
    {
        $docs_info = $this
            ->getDocsInfo()
            ->where('doctors.slug', '=', $slug)
            ->get();

        if ($docs_info) {
            return response()->json([
                'success' => true,
                'result' => $docs_info,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'result' => 'doctor not found 404',
            ]);
        }
    }

    public function showDoctorsBySpec($spec_id)
    {
        $docs_info = $this
            ->getDocsInfo()
            ->where('specializations.id', '=', $spec_id)
            ->get();

        if ($docs_info) {
            return response()->json([
                'success' => true,
                'result' => $docs_info,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'result' => 'doctor not found 404',
            ]);
        }
    }

    /**
     * Return  docs_info = an array of doctor with user-info and avgVote
     *
     */
    private function getDocsInfo()
    {
        $docs_info = Doctor::select(
            'doctors.id',
            'users.name AS name',
            'lastname',
            'slug',
            'email',
            'phone',
            'photo',
            'address',
            'cv',
            'service',
            Doctor::raw('AVG(votes.vote) as avgVote')
        )
            ->with(['specializations'])
            ->join('doctor_vote', 'doctors.id', '=', 'doctor_vote.doctor_id')
            ->join('votes', 'doctor_vote.vote_id', '=', 'votes.id')
            ->join('doctor_specialization', 'doctors.id', '=', 'doctor_specialization.doctor_id')
            ->join('specializations', 'doctor_specialization.specialization_id', '=', 'specializations.id')
            ->join('users', 'doctors.id', '=', 'users.id')
            ->groupBy('doctors.id');

        return $docs_info;
    }
}
