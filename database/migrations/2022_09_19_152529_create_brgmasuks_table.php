<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrgmasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brgmasuks', function (Blueprint $table) {
            $table->id();
            $table->string('no_brgmasuk');
            $table->unsignedBigInteger('barangs_id');
            $table->foreign('barangs_id')->references('id')->on('barangs')->onDelete('cascade');
            $table->integer('jumlah_brgmasuk')->nullable();
            $table->bigInteger('total')->nullable();
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
        Schema::dropIfExists('brgmasuks');
    }
}
