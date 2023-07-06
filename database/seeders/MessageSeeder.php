<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Message;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $messages = [
            (object) [
                'name_patient' => 'andrea',
                'email_patient' => 'andre.ferrari@gmail.com',
                
            ],
            (object) [
                'name_patient' => 'riccardo',
                'email_patient' => 'riccardo.ferrari@gmail.com',

            ],
            (object) [
                'name_patient' => 'nico',
                'email_patient' => 'nico.ferrari@gmail.com',
            ],
        ];

        foreach ($messages as $message) {
            $message_create = new Message();
            $message_create->name_patient = $message->name_patient;
            $message_create->email_patient = $message->email_patient;
            $message_create->date_time = now();
            $message_create->save();

        }
    }
}
