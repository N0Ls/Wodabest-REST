<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->string('title');
            $table->mediumText('description');
            $table->string('filename');
            $table->bigInteger('score')->unsigned()->default(1500);
            $table->bigInteger('wins')->unsigned()->default(0);
            $table->bigInteger('losses')->unsigned()->default(0);
            $table->bigInteger('rank')->unsigned()->default(0);
            $table->timestamps();

            //$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            /*$table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
