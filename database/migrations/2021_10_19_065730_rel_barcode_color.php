<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelBarcodeColor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barcode_color', function (Blueprint $table) {
            $table->unsignedBigInteger('barcode_id');
//            $table->foreign('barcode_id')->references('id')->on('barcodes')->onDelete('cascade');
            $table->unsignedBigInteger('color_id');
//            $table->foreign('color_id')->reference  s('id')->on('colors')->onDelete('cascade');
            $table->primary(['barcode_id','color_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barcode_color');
    }
}
