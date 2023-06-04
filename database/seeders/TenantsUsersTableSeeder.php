<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class TenantsUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Default',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('12345678'),
        ]);
    }
}
