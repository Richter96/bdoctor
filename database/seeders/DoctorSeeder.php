<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Doctor;
use Illuminate\Support\Str;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_base = array(
            (object) [
                'name' => 'Andrea',
                'lastname' => 'Ferrari',
                'phone' => '3334567890',
                'address' => 'Via Montenapoleone 1 MI',
                'service' => 'Sono un medico esperto impegnato a offrire cure mediche di eccellenza, garantendo diagnosi accurate e trattamenti personalizzati per migliorare la salute e il benessere dei miei pazienti.'
            ],
            (object) [
                'name' => 'Daniele',
                'lastname' => 'Morello',
                'phone' => '3334567891',
                'address' => 'Via Veneto 2 RM',
                'service' => 'Sono un professionista medico dedicato a fornire assistenza completa e compassionevole. Attraverso una combinazione di diagnosi accurate e terapie mirate, mi impegno a promuovere la salute e il recupero dei miei pazienti.'
            ],
            (object) [
                'name' => 'Martina',
                'lastname' => 'DeRose',
                'phone' => '3334567892',
                'address' => 'Corso Vittorio Emanuele-II 3 TO',
                'service' => 'Sono un medico altamente qualificato che si dedica a offrire assistenza medica completa e personalizzata. Sfrutto le ultime conoscenze mediche per garantire il benessere e il trattamento efficace dei miei pazienti.'
            ],
            (object) [
                'name' => 'Riccardo',
                'lastname' => 'Castiglione',
                'phone' => '3334567893',
                'address' => 'Via della Spiga 4 MI ',
                'service' => 'Sono un medico appassionato che si impegna a offrire una cura di qualità superiore. Attraverso un approccio basato sull ascolto e la comprensione delle esigenze dei miei pazienti, fornisco soluzioni personalizzate per migliorare la loro salute e qualità di vita.'
            ],
            (object) [
                'name' => 'Nicola',
                'lastname' => 'Faedo',
                'phone' => '3334567894',
                'address' => 'Via Condotti 5 RM',
                'service' => 'Sono un medico specializzato nel fornire servizi sanitari completi. Con un enfasi sulla prevenzione, diagnosi accurata e trattamenti innovativi, mi impegno a supportare i miei pazienti nel raggiungimento e nel mantenimento di una salute ottimale. '
            ],
            (object) [
                'name' => 'Luca',
                'lastname' => 'Neri',
                'phone' => '3334567895',
                'address' => 'Corso Umberto-I 6 NA',
                'service' => 'Sono un professionista medico impegnato a fornire cure compassionate e mirate. Con una vasta esperienza e competenze in diverse aree mediche, lavoro per identificare e trattare le cause sottostanti delle malattie, migliorando così il benessere globale dei miei pazienti.'
            ],
            (object) [
                'name' => 'Marco',
                'lastname' => 'Rossi',
                'phone' => '3334567896',
                'address' => 'Corso Italia 7 FI',
                'service' => 'Sono un medico dedicato a fornire una gamma completa di servizi sanitari. Attraverso applicazione di approcci integrati e terapie innovative, lavoro per migliorare la salute fisica e mentale dei miei pazienti, consentendo loro di vivere una vita piena e attiva.'
            ],
            (object) [
                'name' => 'Matteo',
                'lastname' => 'Bianchi',
                'phone' => '3334567897',
                'address' => 'Via Toledo 8 NA',
                'service' => 'Sono un medico impegnato nel fornire cure mediche personalizzate e di alta qualità. Con una comunicazione aperta e una relazione di fiducia con i miei pazienti, cerco di comprendere le loro esigenze specifiche per offrire soluzioni efficaci e migliorare il loro stato di salute complessivo.'
            ],
            (object) [
                'name' => 'Giovani',
                'lastname' => 'Verdi',
                'phone' => '3334567898',
                'address' => 'Via Roma 9 TO',
                'service' => 'Sono un medico con una passione per il benessere dei miei pazienti. Attraverso una combinazione di approcci tradizionali e integrativi, mi impegno a fornire assistenza completa e olistica, concentrandomi sulla salute a lungo termine e la prevenzione delle malattie.'
            ],
            (object) [
                'name' => 'Maria',
                'lastname' => 'Rame',
                'phone' => '3334567899',
                'address' => 'Corso Buenos Aires 10 MI',
                'service' => 'Sono un medico dedicato a offrire cure individualizzate e basate sull evidenza. Attraverso un attenta valutazione e una gestione accurata delle condizioni mediche, lavoro per ottimizzare la salute e il benessere dei miei pazienti, garantendo un approccio centrato sulla persona.'
            ],
        );

        foreach ($user_base as $user) {
            $user_create = new User();
            $user_create->name = $user->name;
            $user_create->lastname = $user->lastname;
            $user_create->email = strtolower($user->name . '.' . $user->lastname . '@example.com');
            $user_create->password = bcrypt('password');
            $user_create->save();

            $doctor_create = new Doctor();
            $doctor_create->phone = $user->phone;
            $doctor_create->address = $user->address;
            $doctor_create->service = $user->service;
            $doctor_create->slug = Str::slug(($user_create->name . $user_create->id), '-');
            $doctor_create->save();
        }
    }
}
