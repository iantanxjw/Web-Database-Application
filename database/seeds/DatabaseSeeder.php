<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert(["name" => "Shrek", "desc" => "Green man in a swap with a donkey", "genre" => "comedy", "year" => "2001"]);
    }
}
