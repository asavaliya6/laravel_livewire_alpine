<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Voting;

class VotingSeeder extends Seeder
{
    public function run(): void
    {
        Voting::create(['candidate_name' => 'Candidate A']);
        Voting::create(['candidate_name' => 'Candidate B']);
        Voting::create(['candidate_name' => 'Candidate C']);
    }
}
