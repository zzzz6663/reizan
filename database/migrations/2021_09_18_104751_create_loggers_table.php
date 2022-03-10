<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoggersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
     {
//
//
//
//        Schema::create('loggers', function (Blueprint $table) {
//            $table->id();
//            $table->string('name');
//            $table->text('info')->nullable();
//            $table->timestamps();
//        });
//
//        Schema::create('logger_values', function (Blueprint $table) {
//            $table->id();
//            $table->unsignedBigInteger('logger_id');
//            $table->foreign('logger_id')->references('id')->on('loggers')->onDelete('cascade');
//            $table->string('value');
//            $table->timestamps();
//        });
//
//        Schema::create('repairs', function (Blueprint $table) {
//            $table->id();
//            $table->unsignedBigInteger('product_id');
//            $table->string('name');
//
//            $table->timestamps();
//        });
//
//        Schema::create('logger_repair', function (Blueprint $table) {
//            $table->unsignedBigInteger('logger_id');
//            $table->foreign('logger_id')->references('id')->on('loggers')->onDelete('cascade');
//            $table->unsignedBigInteger('repair_id');
//            $table->foreign('repair_id')->references('id')->on('repairs')->onDelete('cascade');
//
//            $table->unsignedBigInteger('value_id');
//            $table->foreign('value_id')->references('id')->on('logger_values')->onDelete('cascade');
//
//            $table->primary(['logger_id','repair_id','value_id']);
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('dls');
//        Schema::dropIfExists('logger_product');
//        Schema::dropIfExists('logger_values');
//        Schema::dropIfExists('loggers');
    }
}
