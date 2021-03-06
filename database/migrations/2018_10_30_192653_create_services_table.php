<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ar_title');
            $table->string('icon');
            $table->text('description')->nullable();
            $table->string('image')->default('resources/assets/web/images/service1.jpg');
            $table->string('image2')->default('resources/assets/web/images/dental-clinic.png');
            $table->unsignedInteger('user_id')->nullable();

            

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')
            ->onDelete('cascade');

            $table->softDeletes();
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
        Schema::dropIfExists('services');
    }
}