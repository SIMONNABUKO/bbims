<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('admin_id')->default(1);
            $table->string('phone')->nullable();
            $table->string('blood_type')->nullable();
            $table->string('address')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('subcounty')->nullable();
            $table->integer('is_admin')->default(0);
            $table->integer('is_donor')->default(0);
            $table->integer('is_patient')->default(0);
            $table->integer('is_blood_bank')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}