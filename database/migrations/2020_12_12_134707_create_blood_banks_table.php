<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_banks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user_id');
            $table->integer('A_plus')->default(0);
            $table->integer('A_minus')->default(0);
            $table->integer('B_plus')->default(0);
            $table->integer('B_minus')->default(0);
            $table->integer('O_plus')->default(0);
            $table->integer('O_minus')->default(0);
            $table->integer('AB_plus')->default(0);
            $table->integer('AB_minus')->default(0);
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
        Schema::dropIfExists('blood_banks');
    }
}
