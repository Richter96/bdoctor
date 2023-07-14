<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Doctor;
use App\Models\Specialization;
use App\Models\Sponsorship;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

        if ($request->hasFile('cv')) {
            $cv_doctor = Storage::put('uploads', $val_data['cv']);
            $val_data['cv'] = $cv_doctor;
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
            $sponsorships = Sponsorship::all();

            return view('doctor.edit', compact('doctor', 'specializations', 'user', 'sponsorships'));
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

        //se l'utente ha selezionato una sponsorizzazione
        if ($request->sponsorship) {
            $sponsorship_id = $request->sponsorship;
            $this->add_sponsorship($user_id, $sponsorship_id);
        }

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

        if ($request->hasFile('cv')) {
            if ($doctor->cv) {
                Storage::delete($doctor->cv);
            }
            $cv_doctor = Storage::put('uploads', $val_data['cv']);
            $val_data['cv'] = $cv_doctor;
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

    private function add_sponsorship($doctor_id, $sponsorship_id)
    {
        $sponsorship = Sponsorship::find($sponsorship_id);

        $duration = $sponsorship->duration;
        $day_duration = $duration / 24;

        $has_sponsorship = DB::table('doctor_sponsorship')->where('doctor_id', '=', $doctor_id)->get();

        // Controlliamo se il dottore ha già fatto delle sponsorizzazioni
        if (count($has_sponsorship)) {
            // Recuperiamo la scadenza della sponsorizzazione
            $sponsorship_id = $has_sponsorship[0]->sponsorship_id;
            $start_date = $has_sponsorship[0]->start_date;
            $end_date = $has_sponsorship[0]->end_date;
            $created_at = $has_sponsorship[0]->created_at;
            $updated_at = $has_sponsorship[0]->updated_at;
            $end_date_object = Carbon::createFromFormat('Y-m-d H:i:s', $end_date);

            // Controlliamo se la data di scandenza è maggiore di oggi
            if ($end_date_object > now()) {
                $new_end_date = $end_date_object->addDays($day_duration);
            } else {
                // Ci troviamo nel caso in cui la sponsorizzazione del dottore sia già scaduta
                $new_end_date = now()->addDay($day_duration);
            }

            DB::table('doctor_sponsorship')->upsert(
                [
                    'doctor_id' => $doctor_id,
                    'sponsorship_id' => $sponsorship_id,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'success' => '1',
                    'created_at' => $created_at,
                    'updated_at' => $updated_at,
                ],
                ['doctor_id', 'sponsorship_id'],
                ['end_date' => $new_end_date]
            );
        } else {
            // Qui ci ritroviamo nel caso in cui il dottore non abbia mai fatto una sponsorizzazione oppure
            $new_end_date = now()->addDay($day_duration);
            DB::table('doctor_sponsorship')->insert([
                'doctor_id' => $doctor_id,
                'sponsorship_id' => $sponsorship_id,
                'start_date' => now(),
                'end_date' => $new_end_date,
                'success' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
