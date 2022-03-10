<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('parts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price')->default(0);
            $table->timestamps();
        });

        Schema::create('part_product', function (Blueprint $table) {
            $table->unsignedBigInteger('part_id');
//            $table->foreign('part_id')->references('id')->on('parts')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
//            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->primary(['part_id','product_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('part_product');
        Schema::dropIfExists('parts');
    }
}
