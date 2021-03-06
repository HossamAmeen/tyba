<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('clinics')) {
            Schema::create('clinics', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('doctor')->nullable();
                $table->string('postion')->nullable();
                $table->string('appointments')->nullable();
                $table->text('descriptionPoint')->nullable();
                $table->string('img')->default('resources/assets/web/images/doctor.png');
                $table->unsignedInteger('user_id')->nullable();


                $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')
                    ->onDelete('cascade');
                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinics');
    }
}