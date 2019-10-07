<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('topic_title');
            $table->string('status');
            $table->unsignedBigInteger('meeting_id')->index();
            $table->string("topic_hour");
            $table->timestamps();
        });
        
        Schema::table('topics', function($table)
        {
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
        Schema::dropIfExists('topics');
    }
}
