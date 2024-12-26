<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_id = Role::first()->id;
        Admin::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('password'),
            'role_id'=> $role_id ,
        ]);
    }
}
