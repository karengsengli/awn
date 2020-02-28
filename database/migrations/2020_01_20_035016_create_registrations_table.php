<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('passport')->nullable();
            $table->string('nationality')->nullable();
            $table->date('check_in')->nullable();
            $table->date('check_out')->nullable();
            $table->date('est_check_out')->nullable();
            $table->string('adult')->nullable();
            $table->string('child')->nullable();
            $table->unsignedBigInteger('room_type_id');
            $table->unsignedBigInteger('guest_time_id');
            $table->string('room_no')->nullable();
            $table->string('extra_bed')->nullable();
            $table->integer('qty');
            $table->integer('total')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('registrations');
    }
}
