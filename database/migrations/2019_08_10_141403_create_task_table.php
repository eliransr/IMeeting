<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('status');
            $table->string('name');
            $table->unsignedBigInteger('user_id')->index();
            $table->date('due_date');
            $table->unsignedBigInteger('meeting_id')->index();
            $table->timestamps();
            
        });

        Schema::table('tasks', function($table)
        {
            $table ->foreign('meeting_id')
                    ->references('id')
                    ->on('meetings') 
                    ->onDelete('cascade');
            
            $table ->foreign('user_id')
                    ->references('id')
                    ->on('users') 
                    ->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
