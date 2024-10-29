<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name',191);
            $table->string('email',191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',191);
            $table->string('verification_code',191)->nullable();
            $table->integer('is_verified')->default(0);
            $table->integer('phone')->default(0);
            $table->string('address',191)->nullable();
            $table->string('gender',191)->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('image',191)->nullable();
            $table->string('certificate',191)->nullable();
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
        Schema::dropIfExists('students');
    }
}
