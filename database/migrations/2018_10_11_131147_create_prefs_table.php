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
            $table->string('arAddress');
            $table->string('arDescription');
            $table->text('descriptionPoint');
            $table->string('phone');
            $table->string('mainEmail');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('video');
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
