<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PrioritiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('priorities')->insert([ 'priority_id' => '1', 'priority_title' => 'Laag']);
       DB::table('priorities')->insert([ 'priority_id' => '3', 'priority_title' => 'Normaal']);
       DB::table('priorities')->insert([ 'priority_id' => '5', 'priority_title' => 'Hoog']);
    }
}
