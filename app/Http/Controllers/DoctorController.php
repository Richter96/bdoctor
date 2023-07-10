<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Doctor;
use App\Models\Specialization;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isEmpty;

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

        $doctor = Doctor::find($user_id);

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

        $user = user::find($user_id);
        $doctor = Doctor::find($user_id);
        $doctor->update($val_data);

        if ($request->has('specializations')) {
            $doctor->specializations()->sync($request->specializations);
        }

        if ($request->hasFile('photo')) {
            $photo_doctor = Storage::put('uploads', $val_data['photo']);
            $val_data['photo'] = $photo_doctor;
        }

        return view('doctor.show', compact('doctor', 'user'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {

        $user_id = Auth::id();

        $average = $this->getAverage($user_id);

        if ($doctor->id == $user_id) {

            $user = user::find($user_id);

            return view('doctor.show', compact('doctor', 'user', 'average'));
        } else {
            abort(403, 'Accesso negato');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {

        $user_id = Auth::id();

        if ($doctor->id == $user_id) {
            $user = user::find($user_id);

            $specializations = Specialization::orderByDesc('id')->get();

            return view('doctor.edit', compact('doctor', 'specializations', 'user'));
        } else {
            abort(403, 'Accesso negato');
        }
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
        $average = $this->getAverage($user_id);

        $user = User::findOrFail($user_id);
        $user->name = $val_data['name'];
        $user->lastname = $val_data['lastname'];
        $user->save();

        if ($request->has('specializations')) {
            $doctor->specializations()->sync($request->specializations);
        }

        if ($request->hasFile('photo')) {
            if ($doctor->photo) {
                Storage::delete($doctor->photo);
            }
            $photo_doctor = Storage::put('uploads', $val_data['photo']);
            $val_data['photo'] = $photo_doctor;
        }

        $doctor->update($val_data);

        return view('doctor.show', compact('doctor', 'user', 'average'));
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

    private function getAverage($user_id)
    {
        $average = Doctor::select(Doctor::raw('AVG(votes.vote) as avgVote'))
            ->join('doctor_vote', 'doctors.id', '=', 'doctor_vote.doctor_id')
            ->join('votes', 'doctor_vote.vote_id', '=', 'votes.id')
            ->groupBy('doctors.id')
            ->where('doctors.id', '=', $user_id) // Select the specific user whit user_id
            ->get();
        return $average; // With [0] i selected the only-one array element 
    }
}
