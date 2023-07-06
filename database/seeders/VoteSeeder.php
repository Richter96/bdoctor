<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Vote;
class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $votes_list=[
            '1',
            '2',
            '3',
            '4',
            '5'
        ];

        foreach($votes_list as $vote){
            $newVote = new Vote();
            $newVote->vote= $vote;
            $newVote->save();
        }
    }
}
