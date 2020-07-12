<?php

use App\Models\User;
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
        User::updateOrCreate([
        	'name' => 'admin',
        	'email' => 'admin@admin.com',
        	'password' => Hash::make('admin123'),
        	'role' => 'admin'
        ]);
    }
}
