<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('prefs')){
        Schema::create('prefs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('arAddress')->nullable();
            $table->text('arDescription')->nullable();
            $table->text('description')->nullable();
            $table->text('about_us')->nullable();
            $table->text('serviceDescription')->nullable();
            $table->string('phone')->nullable();
            $table->string('mainEmail')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('video')->nullable();
            $table->string('andriod_app')->nullable();
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
        Schema::dropIfExists('prefs');
    }
}
