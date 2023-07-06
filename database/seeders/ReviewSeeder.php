<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reviews =[
            (object) [
                'name_patient' => 'daniele',
                'text' => 'bravo ragazzo'
            ],
            (object) [
                'name_patient' => 'martina',
                'text' => 'bravo ragazzo'
            ]
        ];

        foreach ($reviews as $review) {
            $review_create = new Review();
            $review_create->name_patient = $review->name_patient;
            $review_create->text = $review->text;
            $review_create->save();
        }
    }
}
