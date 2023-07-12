<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $docs_info = $this
            ->getDocsInfo()
            ->get()
            ->where('end_date', '>', now());

        return response()->json([
            'success' => true,
            'doc_info' => $docs_info,

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

    public function search(Request $request)
    {
        $docs_info = $this
            ->getDocsInfo()
            ->where('specializations.id', '=', $request->spec_id)
            ->get()
            // Queste where devono stare dopo il get altrimenti non funzionano, probabilmente è perchè sono delle subQuery
            ->where('countReviews', '>=', $request->countReviews)
            ->where('avgVote', '>=', $request->avgVote);

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
     * Return docs_info = an array of doctor with user-info and avgVote and count-review
     */
    public function getDocsInfo()
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
            'doctor_sponsorship.end_date',
            // Abbiamo scelto di utilizzare delle Subquery per far comparire il counter = 0
            // per i doctor che non hanno ne voti e ne recensioni, altrimenti questi dottori sarebbero stati esclusi dalla query
            Doctor::raw('(SELECT COUNT(*) FROM reviews WHERE reviews.doctor_id = doctors.id) AS countReviews'), //Subquery che lavora autonomamente sulla tabella inserita tra parentesi
            // Subquery che ci seleziona i voti di ogni dottore(gli devono corrispondere tra doctor_vote e doctor_id) dalla tabbela voti e ci fa la media
            // Abbiamo dovuto inserire una JOIN in questa subquery perchè tra doctor e votes c'era una relazione many-to-many
            Doctor::raw('(SELECT AVG(votes.vote) FROM doctor_vote JOIN votes ON doctor_vote.vote_id = votes.id WHERE doctor_vote.doctor_id = doctors.id) AS avgVote'),

            Doctor::raw('(SELECT sponsorship_id FROM doctor_sponsorship LEFT JOIN sponsorships ON doctor_sponsorship.sponsorship_id = sponsorships.id WHERE doctor_sponsorship.doctor_id = doctors.id) AS sponsorship_id'),

        )
            ->with(['specializations'])
            ->join('doctor_specialization', 'doctors.id', '=', 'doctor_specialization.doctor_id')
            ->join('specializations', 'doctor_specialization.specialization_id', '=', 'specializations.id')
            ->Join('doctor_sponsorship', 'doctors.id', '=', 'doctor_sponsorship.doctor_id')
            ->Join('sponsorships', 'doctor_sponsorship.sponsorship_id', '=', 'sponsorships.id')
            ->join('users', 'doctors.id', '=', 'users.id');
        // ->groupBy('doctors.id'); // va rimosso perchè se no da errore

        return $docs_info;
    }

    public function sponsoredDoctors($getDocsInfo)
    {
        $sponsoredDoctor = $getDocsInfo;
        // dd($sponsoredDoctor);
        dd(now());

        return $sponsoredDoctor;
    }
}
