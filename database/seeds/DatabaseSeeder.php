<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([UsersTableSeeder::class]); 
         $this->call([MeetingTableSeeder::class]); 
         $this->call([RolesTableSeeder::class]); 
         $this->call([TopicsTableSeeder::class]); 
         $this->call([TasksTableSeeder::class]); 
         $this->call([OrganizationsTableSeeder::class]); 
    }
}
