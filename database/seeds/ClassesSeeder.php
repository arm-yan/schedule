<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            'title'     => '1st Class (A)'
        ]);
        DB::table('classes')->insert([
            'title'     => '1st Class (B)'
        ]);
        DB::table('classes')->insert([
            'title'     => '2nd Class'
        ]);
        DB::table('classes')->insert([
            'title'     => '3rd Class (A)'
        ]);
        DB::table('classes')->insert([
            'title'     => '3rd Class (B)'
        ]);
    }
}
