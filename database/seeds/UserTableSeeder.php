<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => Carbon::now()->timestamp,
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'Pro User',
            'username' => 'prouser',
            'email' => 'prouser@gmail.com',
            'email_verified_at' => Carbon::now()->timestamp,
            'password' => bcrypt('prouser'),
            'role' => 'pro'
        ]);
        User::create([
            'name' => 'Free User',
            'username' => 'freeuser',
            'email' => 'freeuser@gmail.com',
            'email_verified_at' => Carbon::now()->timestamp,
            'password' => bcrypt('freeuser'),
            'role' => 'free'
        ]);
        
    }
}
