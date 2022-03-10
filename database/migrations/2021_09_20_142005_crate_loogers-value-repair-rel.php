<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrateLoogersValueRepairRel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {



        Schema::create('loggers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('info')->nullable();
            $table->timestamps();
        });

        Schema::create('logger_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('logger_id');
            $table->foreign('logger_id')->references('id')->on('loggers')->onDelete('cascade');
            $table->string('value');
            $table->timestamps();
        });

        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barcode_id');
            $table->string('name')->nullable();
            $table->string('tell')->nullable();
            $table->string('shipping')->nullable();
            $table->string('address')->nullable();
            $table->string('comment')->nullable();
            $table->string('img1')->nullable();
            $table->string('img2')->nullable();
            $table->string('img3')->nullable();
            $table->string('bar')->nullable();
            $table->string('defect')->nullable();
            $table->text('report')->nullable();
            $table->text('redate')->nullable();
            $table->text('wage')->nullable();
            $table->text('explain')->nullable();
            $table->text('dename')->nullable();
            $table->text('dedate')->nullable();


            $table->timestamps();
        });

        Schema::create('logger_repair', function (Blueprint $table) {
            $table->unsignedBigInteger('logger_id');
            $table->foreign('logger_id')->references('id')->on('loggers')->onDelete('cascade');
            $table->unsignedBigInteger('repair_id');
            $table->foreign('repair_id')->references('id')->on('repairs')->onDelete('cascade');


            $table->primary(['logger_id','repair_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
