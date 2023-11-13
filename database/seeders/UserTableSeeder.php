<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Admin', 
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('adminpw'),
            'no_telpon'=>'088267135671',
            'role' =>'administrator',
        ]);
    }
}
