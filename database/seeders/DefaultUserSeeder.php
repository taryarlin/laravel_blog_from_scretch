<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'admin@gmail.com',
            'phone' => '12321456789',
            'password' => 123123123,
            'email_verified_at' => Carbon::now(),
        ]);
    }
}
