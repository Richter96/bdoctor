<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Doctor;
use App\Models\Specialization;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        // dd($user_id);
        // $doctor = Doctor::where('id', $user_id)->get(); // non funziona rotta show in
        $doctor = Doctor::find($user_id);
        // $user = User::where('id', $user_id)->get();

        // dd($user_id, $doctor);

        return view('doctor.index', compact('doctor'));
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
    public function store(StoreDoctorRequest $request)
    {
        $val_data = $request->validated();
        $user_id = Auth::id();

        $userDetail = user::find($user_id);
        $doctor->update($val_data);
        
        if($request ->has('specializations')){
            $doctor->specializations()->sync($request->specializations);
        }
        return view('doctor.show', compact('doctor', 'userDetail'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {

        $user_id = Auth::id();
        // $user = User::where('id', $user_id)->get();
        $userDetail = user::find($user_id);
        // dd($userDetail);

        return view('doctor.show', compact('doctor', 'userDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {  
        $user_id = Auth::id();
        $userDetail = user::find($user_id);
 
        $specializations = Specialization::orderByDesc('id')->get();
        return view('doctor.edit', compact('doctor', 'specializations', 'userDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        $val_data = $request->validated();
        $user_id = Auth::id();

        $userDetail = User::findOrFail($user_id);
        $userDetail->name = $val_data['name'];
        $userDetail->save();

        $doctor->update($val_data);
        if ($request->has('specializations')) {
            $doctor->specializations()->sync($request->specializations);
        }

        return view('doctor.show', compact('doctor', 'userDetail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
