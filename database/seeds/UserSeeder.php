<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email'=>'fonder@gmail.com',
            'password'=>Hash::make("aaaaaaaa"),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
