<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Merida',
        	'email' => 'test@test.com',
        	'password' => Hash::make('text'),
        	'saved' => [1,5,11,23]
        ]);
    }
}
