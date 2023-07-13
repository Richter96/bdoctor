<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class SponsorshipController extends Controller
{
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
            $end_date = $has_sponsorship[0]->end_date;
            // Controlliamo se la data di scandenza è maggiore di oggi
            if ($end_date > now()) {
                $new_end_date = $end_date->addDay($day_duration);
            } else {
                // Ci troviamo nel caso in cui la sponsorizzazione del dottore sia già scaduta 
                $new_end_date = now()->addDay($day_duration);
            }
            DB::table('doctor_sponsorship')->insert([
                'doctor_id' => $request->user_id,
                'sponsorship_id' => $request->sponsorship_id,
                'start_date' => now(),
                'end_date' => $new_end_date,
                'success' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
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
            'duration' => $duration,
            'has_sponsorship' => count($has_sponsorship),
        ]);
    }
}
