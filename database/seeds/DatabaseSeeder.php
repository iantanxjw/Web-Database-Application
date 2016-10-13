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
        //DB::table('movies')->insert(["name" => "Shrek", "desc" => "Green man in a swap with a donkey", "genre" => "comedy", "year" => "2001"]);
        $this->call('TheatreSeeder');
        $this->call('SessionSeeder');
    }
}

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies = array('118340', '137106', '207703', '271110', '284052',
            '297761', '324668', '332210', '341012', '372058', '390734',
            '396535', '399106', '5174', '5876', '8363', '9461', '95610',
            '96721', '99861');
        $weekdays = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $theatres = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
        $startTimes = array("01:00", "05:00", "10:00", "12:00", "15:30", "18:30", "20:00", "22:00", "23:30");

        for ($i = 0; $i < 100; $i++)
        {
            DB::table("sessions")->insert([
                'weekday' => $weekdays[array_rand($weekdays)],
                'start_time' => $startTimes[array_rand($startTimes)],
                'duration' => rand(90, 300),
                'num_bookings' => 0,
                'mv_id' => $movies[array_rand($movies)],
                't_id' => $theatres[array_rand($theatres)],
            ]);
        }
    }
}

class TheatreSeeder extends Seeder
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
            'location' => 'DaisyLand',
            'theatre_num' => 2,
            'seats' => 200,
            ]);

        DB::table('theatres')->insert([
            'location' => 'DaisyLand',
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

