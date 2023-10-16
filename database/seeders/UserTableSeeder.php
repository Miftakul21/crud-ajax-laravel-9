<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

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
            'name'=>'Budi',
            'email'=>'admin@gmail.com',
            'number_phone'=>'08876153412',
            'password'=>Hash::make('admin12345'),
            'role'=>'admin'
        ]);
    }
}