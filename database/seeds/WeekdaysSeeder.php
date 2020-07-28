<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class WeekdaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('weekdays')->insert([
            'title'     => 'Monday'
        ]);
        DB::table('weekdays')->insert([
            'title'     => 'Tuesday'
        ]);
        DB::table('weekdays')->insert([
            'title'     => 'Wednesday'
        ]);
        DB::table('weekdays')->insert([
            'title'     => 'Thursday'
        ]);
        DB::table('weekdays')->insert([
            'title'     => 'Friday'
        ]);
    }
}
