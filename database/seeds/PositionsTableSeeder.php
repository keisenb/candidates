<?php

use App\Position;
use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // todo: finish this

        // state
        Position::create(['name' => 'State House of Representatives', 'description' => 'todo']);
        Position::create(['name' => 'State Senate', 'description' => 'todo']);
        Position::create(['name' => 'Governor', 'description' => 'todo']);

        // district
        Position::create(['name' => 'U.S. Senate', 'description' => 'todo']);
        Position::create(['name' => 'U.S. House of Representatives', 'description' => 'todo']);

        // county

        // city

        
    }
}
