<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodTransferHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_transfer_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('from_bank_id');
            $table->integer('to_bank_id');
            $table->integer('quantity');
            $table->string('blood_type');
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
        Schema::dropIfExists('blood_transfer_histories');
    }
}
