<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use function PHPUnit\Framework\isEmpty;

class SponsorshipController extends Controller
{
    /** 
     * ! Warning
     * Questa API richiede sponsorship_id e user_id
     * La sponsorship_id serve solo per recuperare il day_duration e modifare la end_date della sponsorship
     * Nella tabella doctor_sponsorship non avremo mai più di una riga per un utente, anche se questi fa più sponsorship,
     * Perchè l'utente quando va ad accumulare sponsorship non fa altro che estendere la sua end_date nella sua relativa riga di doctor_sponsorship
     * Nella riga relativa ad un utente la cella che contiene sponsorship_id è poco significante dato che quella riga rappresenta la somma di più sponsorship
     * Nel momenbto in cui un dottore ha già attiva una sponsorizzazione e se ne aggiunge un'altra => nella sua riga succederà che: 
     *  - la end_date della sua sponsorizzazione viene estesa
     *  - lo sponsorship_id relativo alla sponsorizzazione non viene modificato e quindi è come se fosse un dato da non considerare più
     */
    public function update(Request $request)
    {
        $doctor =  Doctor::find($request->user_id);
        $sponsorship = Sponsorship::find($request->sponsorship_id);

        $duration = $sponsorship->duration;
        $day_duration = $duration / 24;

        $has_sponsorship = DB::table('doctor_sponsorship')->where('doctor_id', '=', $request->user_id)->get();

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
                    'doctor_id' => $request->user_id,
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
                'doctor_id' => $request->user_id,
                'sponsorship_id' => $request->sponsorship_id,
                'start_date' => now(),
                'end_date' => $new_end_date,
                'success' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        return response()->json([
            'success' => true,
            'doctor' => $doctor,
            'sponsorship' => $sponsorship,
            'has_sponsorship' => count($has_sponsorship),
        ]);
    }
}
