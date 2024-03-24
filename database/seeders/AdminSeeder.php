<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //
        $admin = new User();
        $admin->name = 'Admin';
        $admin->last_name = 'Doe';
        $admin->image = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvb1Z00-ubxAEY910bz264t8FVAeyvgjKVOwf-Auf0jQ&s';
        $admin->email = 'admin@admin.com';
        $admin->password = Hash::make('test123');
        $admin->confirm_password = Hash::make('test123');
        $admin->is_admin = 1;
        $admin->save();
    }
}
