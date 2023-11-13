<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = "Aditya";

        $users = [];

        User::where('password', 'Aditya')->delete();
        // Delete from users where password = "Aditya"

        for($i=0; $i<1000; $i++)
        {
            array_push($users, [
                    'name' => Str::random(10),
                    'email' => Str::random(5).'@gmail.com',
                    'password' => Hash::make($password)
            ]);
            // User::create([
            //     'name' => Str::random(10),
            //     'email' => Str::random(5).'@gmail.com',
            //     'password' => $password
            // ]);
        }

        User::insert($users);

     
    }
}
