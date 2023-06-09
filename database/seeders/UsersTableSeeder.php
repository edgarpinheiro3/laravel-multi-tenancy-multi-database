<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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
            'name'      => 'Edgar',
            'email'     => 'edgarpinheiro3@gmail.com',
            'password'  => bcrypt('12345678'),
        ]);
    }
}
