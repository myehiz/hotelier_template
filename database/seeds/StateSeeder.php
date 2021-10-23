<?php

use Illuminate\Database\Seeder;
use App\Models\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::insert([
        ['name' => 'state1'], ['name' => 'state2']
        ]);
    }
}
