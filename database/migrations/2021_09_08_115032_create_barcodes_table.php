<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barcodes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('version_id')->nullable();
            $table->unsignedBigInteger('color_id')->nullable();
            $table->string('code')->nullable();
            $table->timestamp('produce')->nullable();
            $table->timestamp('deliver')->nullable();
            $table->timestamp('sell')->nullable();
            $table->string('guaranty')->nullable();
            $table->text('info')->nullable();
            $table->timestamps();
        });
        Schema::create('barcode_user', function (Blueprint $table) {
            $table->unsignedBigInteger('barcode_id');
//            $table->foreign('barcode_id')->references('id')->on('barcodes')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
//            $table->foreign('user_id')->reference  s('id')->on('users')->onDelete('cascade');
            $table->primary(['barcode_id','user_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barcode_user');
        Schema::dropIfExists('barcodes');
    }
}
