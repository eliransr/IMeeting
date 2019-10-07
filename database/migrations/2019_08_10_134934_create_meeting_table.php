<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("title");
            $table->unsignedBigInteger('user_id')->index();
            $table->date("date"); /* ->format('Y-m-d'); */
            $table->string("hour");
            $table->timestamps();
        });
        
        Schema::table('meetings', function($table)
        {

            $table ->foreign('user_id')
                    ->references('id')
                    ->on('users') ->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meetings');
    }
}
