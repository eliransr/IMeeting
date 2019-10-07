<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('meeting_id')->index();
            $table->timestamps();
        });  
           Schema::table('participants', function($table)
        {
            $table ->foreign('user_id')
                    ->references('id')
                    ->on('users') ->onDelete('cascade');
           
            $table ->foreign('meeting_id')
                    ->references('id')
                    ->on('meetings') 
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
        Schema::dropIfExists('participants');
    }
}
