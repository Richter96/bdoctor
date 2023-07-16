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
        $average = Doctor::select(Doctor::raw('CAST(AVG(votes.vote) AS DECIMAL(10,1)) as avgVote'))
            ->join('doctor_vote', 'doctors.id', '=', 'doctor_vote.doctor_id')
            ->join('votes', 'doctor_vote.vote_id', '=', 'votes.id')
            ->groupBy('doctors.id')
            ->where('doctors.id', '=', $user_id) // Select the specific user whit user_id
            ->get();

        return $average; // With [0] i selected the only-one array element
    }

    /** 
     * ! Warning
     * Funzione che prende sponsorship_id e doctor_id e aggiorna la tabella doctor_sponsorship
     * 
     * La sponsorship_id serve solo per recuperare il day_duration e modifare la end_date della sponsorship
     * Nella tabella doctor_sponsorship non avremo mai più di una riga per un utente, anche se questi fa più sponsorship,
     * Perchè l'utente quando va ad accumulare sponsorship non fa altro che estendere la sua end_date nella sua relativa riga di doctor_sponsorship
     * Nella riga relativa ad un utente la cella che contiene sponsorship_id è poco significante dato che quella riga rappresenta la somma di più sponsorship
     * Nel momenbto in cui un dottore ha già attiva una sponsorizzazione e se ne aggiunge un'altra => nella sua riga succederà che: 
     *  - la end_date della sua sponsorizzazione viene estesa
     *  - lo sponsorship_id relativo alla sponsorizzazione non viene modificato e quindi è come se fosse un dato da non considerare più
     */
    private function add_sponsorship($doctor_id, $sponsorship_id)
    {
        $sponsorship = Sponsorship::find($sponsorship_id);
        $duration = $sponsorship->duration;
        $day_duration = $duration / 24;

        // Variabile che indica se l'utente ha già una riga in doctor_sponsorship
        $has_sponsorship = DB::table('doctor_sponsorship')->where('doctor_id', '=', $doctor_id)->get();

        // Controlliamo se il dottore ha già fatto delle sponsorizzazioni
        if (count($has_sponsorship)) {

            // Recuperiamo recuperiamo i dati della vecchia sponsorizzazione
            $sponsorship_id   = $has_sponsorship[0]->sponsorship_id;
            $start_date       = $has_sponsorship[0]->start_date;
            $end_date         = $has_sponsorship[0]->end_date;
            $created_at       = $has_sponsorship[0]->created_at;
            $updated_at       = $has_sponsorship[0]->updated_at;

            // Trasformiamo la stringa end_date in un oggetto cosi da poter effetturare il confronto con now()
            $end_date_object  = Carbon::createFromFormat('Y-m-d H:i:s', $end_date);

            // Controlliamo se la data di scandenza è maggiore di oggi
            if ($end_date_object > now()) {
                // Ci troviamo nel caso in cui la sponsorizzazione del dottore scade più in la della data attuale
                // Creiamo una nuova data di scadenza partendo dalla vecchia data di scadenza e ci aggiungiamo la durata della sponsorship
                $new_end_date = $end_date_object->addDays($day_duration);
            } else {
                // Ci troviamo nel caso in cui la sponsorizzazione del dottore sia già scaduta
                // Creiamo una nuova data di scadenza partendo dalla data di oggi e ci aggiungiamo la durata della sponsorship
                $new_end_date = now()->addDay($day_duration);
            }

            // Funzione che recupera la riga relativa all'utente doctor_id e aggiorna i parametri che vogliamo noi
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

                // Qui viene aggiornato il parametro end_date con il new_end_date calcolato in precedenza
                ['end_date' => $new_end_date]
            );
        } else {
            // Qui ci ritroviamo nel caso in cui il dottore non ha mai fatto una sponsorizzazione 
            // Creiamo una nuova data di scadenza partendo dalla data di oggi e ci aggiungiamo la durata della sponsorship
            $new_end_date = now()->addDay($day_duration);

            // Funzione che aggiunge una nuova riga relativa a doctor_id nella tabella doctor_sponsorship 
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
