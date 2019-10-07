<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert
        (
            [
                [
                    'role' => 'employee',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            
                [    'role' => 'manager',
                     'created_at' => now(),
                     'updated_at' => now(),
                ],
                
                [    'role' => 'admin',
                     'created_at' => now(),
                     'updated_at' => now(),
                 ],
                
               
            ]);
    }
}
