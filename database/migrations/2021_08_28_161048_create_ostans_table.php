<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOstansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ostans', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->timestamps();
        });
//        Schema::create('ostan_user', function (Blueprint $table) {
//            $table->unsignedBigInteger('ostan_id');
////            $table->foreign('ostan_id')->references('id')->on('ostans')->onDelete('cascade');
//            $table->unsignedBigInteger('user_id');
////            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//            $table->unique(['ostan_id','user_id']);
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ostans');
    }
}
