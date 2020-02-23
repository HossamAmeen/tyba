<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->text('appointments')->nullable();
            $table->string('img')->default('resources/assets/admin/images/avatar-80.png');

            $table->unsignedInteger('clinic_id')->nullable();
            $table->foreign('clinic_id')->references('id')->on('clinics')->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('events');
    }
}
