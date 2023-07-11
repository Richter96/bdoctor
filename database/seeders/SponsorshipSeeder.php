<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sponsorship;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsorships = [
            (object) [
                'name' => 'bronze',
                'price' => '2.99',
                'duration' => '24',
            ],
            (object) [
                'name' => 'silver',
                'price' => '5.99',
                'duration' => '72',
            ],
            (object) [
                'name' => 'gold',
                'price' => '9.99',
                'duration' => '144',
            ],
            ];
            foreach($sponsorships as $sponsorship) {
                $new_sponsorship = new Sponsorship();
                $new_sponsorship->name = $sponsorship->name;
                $new_sponsorship->price = $sponsorship->price;
                $new_sponsorship->duration = $sponsorship->duration;
                $new_sponsorship->save();
            }
    }
}
