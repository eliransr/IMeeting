<?php

use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topics')->insert
        (
            [
                [
                    'topic_title' => 'topic 1',
                    'status' => 'undone',
                    'meeting_id' => '1',
                    'topic_hour' => '10:00',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            
                [
                    'topic_title' => 'topic 2',
                    'status' => 'undone',
                    'meeting_id' => '2',
                    'topic_hour' => '11:00',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                
                [
                    'topic_title' => 'topic 3',
                    'status' => 'undone',
                    'meeting_id' => '3',
                    'topic_hour' => '12:00',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                
                [
                    'topic_title' => 'topic 4',
                    'status' => 'undone',
                    'meeting_id' => '4',
                    'topic_hour' => '13:00',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                 [
                    'topic_title' => 'topice 5',
                    'status' => 'undone',
                    'meeting_id' => '1',
                    'topic_hour' => '14:00',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
    }
}
