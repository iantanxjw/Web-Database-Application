<?php

use Illuminate\Database\Seeder;

class theatreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('theatres')->insert([
            'location' => 'Daisyland',
            'theatre_num' => 1,
            'seats' => 200,
            ]);

        DB::table('theatres')->insert([
            'location' => 'Daisy Land',
            'theatre_num' => 2,
            'seats' => 200,
            ]);

        DB::table('theatres')->insert([
            'location' => 'Daisy Land',
            'theatre_num' => 3,
            'seats' => 200,
        ]);

        DB::table('theatres')->insert([
            'location' => 'Mancy Drew',
            'theatre_num' => 4,
            'seats' => 200,
        ]);

        DB::table('theatres')->insert([
            'location' => 'Mancy Drew',
            'theatre_num' => 5,
            'seats' => 200,
        ]);

        DB::table('theatres')->insert([
            'location' => 'Mancy Drew',
            'theatre_num' => 6,
            'seats' => 200,
            ]);

        DB::table('theatres')->insert([
            'location' => 'Ionpoint',
            'theatre_num' => 7,
            'seats' => 200,
        ]);

        DB::table('theatres')->insert([
            'location' => 'Ionpoint',
            'theatre_num' => 8,
            'seats' => 200,
        ]);

        DB::table('theatres')->insert([
            'location' => 'Ionpoint',
            'theatre_num' => 9,
            'seats' => 200,
        ]);

        DB::table('theatres')->insert([
            'location' => 'Manthogardens',
            'theatre_num' => 10,
            'seats' => 200,
        ]);

        DB::table('theatres')->insert([
            'location' => 'Manthogardens',
            'theatre_num' => 11,
            'seats' => 200,
        ]);

        DB::table('theatres')->insert([
            'location' => 'Manthogardens',
            'theatre_num' => 12,
            'seats' => 200,
            ]);
    }
}
