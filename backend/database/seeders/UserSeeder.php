<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $users = [[
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'), // password
            'remember_token' => Str::random(10),
            'status' => 'A'
        ], [
            'first_name' => 'Mark Thaddeus',
            'last_name' => 'Manuel',
            'email' => 'markmanu06@gmail.com',
            'password' => Hash::make('manuel'), // password
            'remember_token' => Str::random(10),
            'status' => 'E'
        ]];

        DB::table('users')->insert($users);
    }
}
