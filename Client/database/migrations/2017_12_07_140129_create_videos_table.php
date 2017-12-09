<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id_video',10);
            //$table->primary('id_video');
            $table->string('tittle',100);
            $table->string('description',100);
            $table->string('path',100);
            $table->string('360_path',100);
            $table->string('720_path',100);
            $table->integer('id_user')->unsigned();
            $table->timestamps();
        });
        Schema::table('videos', function($table){
            $table->foreign('id_user')
                ->references('id_user')
                ->on('users')
                ->onUpdate('cascade')
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
        Schema::dropIfExists('videos');
    }
}
