<?php

use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizations')->insert(
            [
                [
                    'name' => 'HP',
                    'user_id' => '1',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Nike',
                    'user_id' => '2',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'isrotel',
                    'user_id' => '3',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);
    }
}
