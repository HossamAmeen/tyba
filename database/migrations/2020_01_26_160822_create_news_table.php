<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description');
            $table->boolean('is_slider')->default(0);
            $table->text('en_title')->nullable();
            $table->text('vision_mission')->nullable();
            $table->date('date')->default(date("Y-m-d"));
            $table->string('image')->default('resources/assets/admin/images/news.png');
            $table->string('image2')->default('news2.png');
            $table->unsignedInteger('user_id')->nullable();


            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')
                ->onDelete('cascade'); $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
