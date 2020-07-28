<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'     => 'Admin',
            'email'    => 'admin@school.task',
            'password' => Hash::make('123456'),
            'role'     => 'admin',
        ]);

        DB::table('users')->insert([
            'name'     => 'Teacher 1',
            'email'    => 'teacher1@school.task',
            'password' => Hash::make('123456'),
            'role'     => 'teacher',
        ]);

        DB::table('users')->insert([
            'name'     => 'Teacher 2',
            'email'    => 'teacher2@school.task',
            'password' => Hash::make('123456'),
            'role'     => 'teacher',
        ]);

        DB::table('users')->insert([
            'name'     => 'Teacher 3',
            'email'    => 'teacher3@school.task',
            'password' => Hash::make('123456'),
            'role'     => 'teacher',
        ]);

        DB::table('users')->insert([
            'name'     => 'Teacher 4',
            'email'    => 'teacher4@school.task',
            'password' => Hash::make('123456'),
            'role'     => 'teacher',
        ]);
    }
}
