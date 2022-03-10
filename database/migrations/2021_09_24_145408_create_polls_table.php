<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('barcode_id');
            $table->text('how_reizan')->nullable();
            $table->string('visit')->nullable();
            $table->text('how_web')->nullable();
            $table->string('introduction')->nullable();
            $table->string('guidance')->nullable();
            $table->string('other')->nullable();
            $table->string('why')->nullable();
            $table->string('service')->nullable();
            $table->string('follow_up')->nullable();
            $table->string('installation_collision')->nullable();
            $table->string('wage')->nullable();
            $table->string('c_use')->nullable();
            $table->string('packing')->nullable();
            $table->string('info_packing')->nullable();

            $table->string('appearance')->nullable();
            $table->string('info_appearance')->nullable();

            $table->string('possi')->nullable();
            $table->string('info_possi')->nullable();

            $table->string('wa')->nullable();
            $table->string('info_wa')->nullable();

            $table->string('color')->nullable();
            $table->string('info_color')->nullable();

            $table->string('value')->nullable();
            $table->string('info_value')->nullable();

            $table->string('worst')->nullable();
            $table->string('best')->nullable();
            $table->string('rebuy')->nullable();
            $table->string('offer')->nullable();
            $table->text('finish')->nullable();
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
        Schema::dropIfExists('polls');
    }
}
