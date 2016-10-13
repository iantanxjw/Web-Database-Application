<?php
use Illuminate\Database\Seeder;

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
        $theatres = array(1, 2, 3, 4, 5);
        $startTimes = array("22:00", "01:00", "05:00", "10:00", "12:00");

        for ($i = 0; $i < 100; $i++)
        {
            DB::table("sessions")->insert([
                'weekday' => array_rand($weekdays),
                'start_time' => array_rand($startTimes),
                'duration' => rand(90, 300),
                'num_bookings' => 0,
                'movie_id' => array_rand($movies),
                'theatre_id' => array_rand($theatres),
            ]);
        }
//        DB::table('sessions')->insert([
//            'weekdays' => 'Monday',
//            'start_time' => '1:00',
//            'duration' => 200,
//            'num_bookings' => '',
//            'movie_id' => $random_id,
//            'theatre_id' => '',
//            ]);
//
//        DB::table('sessions')->insert([
//            'weekdays' => 'Tuesday',
//            'start_time' => '1:00',
//            'duration' => 200,
//            'num_bookings' => '',
//            'movie_id' => '',
//            'theatre_id' => '',
//        ]);
//
//        DB::table('sessions')->insert([
//            'weekdays' => 'Monday',
//            'start_time' => '1:00',
//            'duration' => '',
//            'num_bookings' => '',
//            'movie_id' => '',
//            'theatre_id' => '',
//        ]);
//
//        DB::table('sessions')->insert([
//            'weekdays' => 'Tuesday',
//            'start_time' => '1:00',
//            'duration' => '',
//            'num_bookings' => '',
//            'movie_id' => '',
//            'theatre_id' => '',
//        ]);
//
//        DB::table('sessions')->insert([
//            'weekdays' => 'Monday',
//            'start_time' => '1:00',
//            'duration' => '',
//            'num_bookings' => '',
//            'movie_id' => '',
//            'theatre_id' => '',
//        ]);
//
//        DB::table('sessions')->insert([
//            'weekdays' => 'Tuesday',
//            'start_time' => '1:00',
//            'duration' => '',
//            'num_bookings' => '',
//            'movie_id' => '',
//            'theatre_id' => '',
//        ]);
//
//        DB::table('sessions')->insert([
//            'weekdays' => 'Monday',
//            'start_time' => '1:00',
//            'duration' => '',
//            'num_bookings' => '',
//            'movie_id' => '',
//            'theatre_id' => '',
//        ]);
//
//        DB::table('sessions')->insert([
//            'weekdays' => 'Tuesday',
//            'start_time' => '1:00',
//            'duration' => '',
//            'num_bookings' => '',
//            'movie_id' => '',
//            'theatre_id' => '',
//        ]);
    }
}
