<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Specialization;


class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specializations_base = [
            'Chirurgia',
            'Pediatria',
            'Oncologia',
            'Cardiologia',
            'Allergologia',
            'Dermatologia',
            'Gastroentorologia',
            'Psichiatria',
            'Medicina del lavoro',
            'Urologia'
        ];

        foreach ($specializations_base as $specialization) {
            $newSpecialization = new Specialization();
            $newSpecialization->name = $specialization;
            $newSpecialization->save();
        }
    }
}
