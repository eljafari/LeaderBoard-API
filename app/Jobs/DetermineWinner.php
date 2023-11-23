<?php

namespace App\Jobs;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use \Illuminate\Support\Facades\Log;

class DetermineWinner
{
    /**
     * Create a new job instance.
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     */
    public function __invoke()
    {

        Log::info('DetermineWinner started!');

        $maxPoints = User::max('points');
        $usersWithMaxPoints = User::where('points', $maxPoints)->get();
        if ($usersWithMaxPoints->count() === 1) {
            DB::table('winners')->insert([
                'user_id' => $usersWithMaxPoints[0]->id,
                'points_at_win' => $usersWithMaxPoints[0]->points,
                'won_at' => now(),
            ]);
        }
    }
}
