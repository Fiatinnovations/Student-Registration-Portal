<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('title_id')->index()->unsigned()->nullable();
            $table->integer('gender_id')->index()->unsigned()->nullable();
            $table->integer('program_id')->index()->unsigned()->nullable();
            $table->string('slug');
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('identification')->unique()->nullable();
            $table->integer('progress')->nullable();
            $table->integer('student')->default(1);
            $table->string('school_a')->nullable();
            $table->string('degree_a')->nullable();
            $table->string('field_a')->nullable();
            $table->integer('commence_id')->index()->unsigned()->nullable();
            $table->integer('graduation_id')->index()->unsigned()->nullable();
            $table->decimal('grade_a', 3, 2)->nullable();
            $table->string('school_b')->nullable();
            $table->string('degree_b')->nullable();
            $table->string('field_b')->nullable();
            $table->decimal('grade_b', 3, 2)->nullable();
            $table->string('certificate')->nullable();
            $table->string('transcript')->nullable();
            $table->string('resume')->nullable();
            $table->string('motivation')->nullable();
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
        Schema::dropIfExists('prospects');
    }
}
