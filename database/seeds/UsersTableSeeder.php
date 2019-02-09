<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('1234567890'),
            'admin' => 1,
            'address' => 'admin',
            'phoneNumber' => 123456789
        ]);
    }
}
