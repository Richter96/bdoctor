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
              'name' => 'andrea',
              'lastname' => 'ferrari',
              'phone' => '1234567890',
              'address' => 'Via capoluogo 22 PV'
            ],
            (object) [
                'name' => 'daniele',
                'lastname' => 'morello',
                'phone' => '1234567891',
                'address' => 'Via capoluogo 23 AG'
            ],
            (object) [
                'name' => 'Martina',
                'lastname' => 'De Rose',
                'phone' => '1234567892',
                'address' => 'Via capoluogo 24 CS'
            ],
            (object) [
                'name' => 'Riccardo',
                'lastname' => 'Castiglione',
                'phone' => '1234567893',
                'address' => 'Via capoluogo 25 MA'
            ],
            (object) [
                'name' => 'Nicola',
                'lastname' => 'Faedo',
                'phone' => '1234567894',
                'address' => 'Via capoluogo 26 PV'
            ],
          );
        
        foreach ($user_base as $user) { 
            $user_create = new User();
            $user_create->name = $user->name;
            $user_create->lastname = $user->lastname;
            $user_create->email = $user->name.'.'.$user->lastname.'@example.com';
            $user_create->password = bcrypt('password');
            $user_create->save();

            $doctor_create = new Doctor();
            /* $doctor_create->user_id = $user_create->id; */
            $doctor_create->phone = $user->phone;
            $doctor_create->address = $user->address;
            $doctor_create->slug = Str::slug(($user_create->name.$user_create->id), '-');
            $doctor_create->save();

        }
    
    }
}
