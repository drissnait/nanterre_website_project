<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'name'=>'admin',
          'email'=>'admin@gmail.com'
          'password'=>Hash::make('admin'),
          'remember_token'=>str_random(10),
        ])
    }
}
