<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'Matan chover',
                    'email' => 'matanchover1@gmail.com',
                    'role' => 'admin',
                    'organization_id' => '1',
                    'email_verified_at' => now(),
                    'password' => Hash::make('12345678'),
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Rony',
                    'email' => 'a@a.com',
                    'role' => 'manager',
                    'organization_id' => '2',
                    'email_verified_at' => now(),
                    'password' => Hash::make('12345678'),
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Yarden',
                    'email' => 'y@y.com',
                    'role' => 'employee',
                    'organization_id' => '3',
                    'email_verified_at' => now(),
                    'password' => Hash::make('12345678'),
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);
    }
}
