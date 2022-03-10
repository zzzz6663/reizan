<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelBarcodeVersion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barcode_version', function (Blueprint $table) {
            $table->unsignedBigInteger('barcode_id');
//            $table->foreign('barcode_id')->references('id')->on('barcodes')->onDelete('cascade');
            $table->unsignedBigInteger('version_id');
//            $table->foreign('version_id')->reference  s('id')->on('versions')->onDelete('cascade');
            $table->primary(['barcode_id','version_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barcode_version');

    }
}
