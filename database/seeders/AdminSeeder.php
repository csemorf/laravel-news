<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        //
        $admin = new Admin();
        $admin->name = 'admin';
        $admin->email = "admin@gmail.com";
        $admin->password = '123123123';
        $admin->save();

    }
}