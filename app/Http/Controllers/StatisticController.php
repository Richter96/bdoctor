<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Vote;
use App\Models\Review;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();

        $doctor = Doctor::find($user_id);

        return view('statistic.index', compact('doctor'));
    }
    public function getData()
    {
        $user_id = Auth::id();
    
        $messagesByMonth = Message::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
            ->where('doctor_id', $user_id)
            ->groupBy('month', 'year')
            ->get();
    
        $votesByMonth = DB::table('doctor_vote')
            ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
            ->where('doctor_id', $user_id)
            ->groupBy('month', 'year')
            ->get();
            
        
        $reviewsByMonth = Review::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
            ->where('doctor_id', $user_id)
            ->groupBy('month', 'year')
            ->get();
        //dd( $reviews);
        
        //Messaggi
        $messageLabels = $messagesByMonth->map(function ($message) {
            return $message->month . '/' . $message->year;
        })->toArray();
    
        $messageData = $messagesByMonth->pluck('count')->toArray();

        //voti
        $voteLabels = $votesByMonth->map(function ($vote) {
            return $vote->month . '/' . $vote->year;
        })->toArray();
        
        $voteData = $votesByMonth->pluck('count')->toArray();
        
        
        //Rece
        $reviewLabels = $reviewsByMonth->map(function ($review) {
            return $review->month . '/' . $review->year;
        })->toArray();
    
        $reviewData = $reviewsByMonth->pluck('count')->toArray();
       
        $responseData = [
            'messageLabels' => $messageLabels,
            'messageData' => $messageData,
            'voteLabels' => $voteLabels,
            'voteData' => $voteData,
            'reviewLabels' => $reviewLabels,
           'reviewData' => $reviewData
        ];
    
        return response()->json($responseData);
    }

}
