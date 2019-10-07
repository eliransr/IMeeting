<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert(
            [
                [
                    'title' => 'task1',
                    'status' => 'undone',
                    'name' => 'Amir',
                    'user_id'=> 1 , 
                    'due_date' => date('Y-m-d G:i:s'),
                    'meeting_id' => 1,
                    'created_at' =>date('Y-m-d G:i:s'),
                    'updated_at'=>date('Y-m-d G:i:s'),
                ],
                [
                    'title' => 'task2',
                    'status' => 'undone',
                    'name' => 'Eyal',
                    'user_id'=> 2 , 
                    'due_date' => date('Y-m-d G:i:s'),
                    'meeting_id' => 2,
                    'created_at' =>date('Y-m-d G:i:s'),
                    'updated_at'=>date('Y-m-d G:i:s'),
                ],
                [
                    'title' => 'task3',
                    'status' => 'undone',
                    'name' => 'Eliran',
                    'user_id'=> 3 , 
                    'due_date' => date('Y-m-d G:i:s'),
                    'meeting_id' => 3,
                    'created_at' =>date('Y-m-d G:i:s'),
                    'updated_at'=>date('Y-m-d G:i:s'),
                ]
            ]
    
        );
    }
}
