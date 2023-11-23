<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Jobs\DetermineWinner;
use Illuminate\Support\Facades\DB;


class DetermineWinnerTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function testDetermineWinnerJob(): void
    {
        DB::table('winners')->insert([
            'user_id' => 2,
            'points_at_win' => 200,
            'won_at' => now(),
        ]);


        // DetermineWinner::dispatch();
        $winner = DB::table('winners')->first();
        $this->assert(1==2);

        // $response = $this->get('/');

        // $response->assertStatus(200);
    }
}
