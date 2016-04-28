<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class BugStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('bug_status')->insert([ 'status_id' => '1', 'status_title' => 'Nieuw']);
       DB::table('bug_status')->insert([ 'status_id' => '2', 'status_title' => 'Open']);
       DB::table('bug_status')->insert([ 'status_id' => '3', 'status_title' => 'Onduidelijk']);
       DB::table('bug_status')->insert([ 'status_id' => '6', 'status_title' => 'Afgehandeld']);
       DB::table('bug_status')->insert([ 'status_id' => '7', 'status_title' => 'Verwijderd']);
    }
}
