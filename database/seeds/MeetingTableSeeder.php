<?php

use Illuminate\Database\Seeder;

class MeetingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meetings')->insert
        (
            [
                [
                    'title' => 'important meeting',
                    'user_id' => '1',
                    'date' => '02.08.19',
                    'hour' => '10:00',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            
                [   'title' => 'important meeting 2',
                    'user_id' => '1',
                    'date' => '03.11.19',
                    'hour' => '19:00',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                
                [   'title' => 'important meeting 3',
                    'user_id' => '1',
                    'date' => '21.10.19',
                    'hour' => '09:00',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                
                [   'title' => 'important meeting 4',
                    'user_id' => '1',
                    'date' => '01.03.19',
                    'hour' => '14:30',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                
                [   'title' => 'important meeting 5',
                    'user_id' => '1',
                    'date' => '01.01.20',
                    'hour' => '12:00',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
    }
}
