<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\Review;
use App\Models\Doctor;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $doctor = Doctor::find($user_id);
        $review = Review::all();
        $reviews = Review::where('doctor_id', $user_id)->orderByDesc('created_at')->get();
        return view('review.index', compact('doctor', 'reviews'));  // $doctor Serve per far funzionare la sidebar
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReviewRequest $request)
    {
        $val_data = $request->validated();
        $new_review = Review::create($val_data);
        return view();
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        $user_id = Auth::id();
        $reviews = Review::find($user_id);
        return view('reviews.index', compact('reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return to_route('review.index')->with('message', 'Review of ' . $review->name_patient . ' deleted');
    }
}
