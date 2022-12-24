<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->dateTimeTz('shift_start_details'); //Time and date with timezone
            $table->dateTimeTz('shift_end_details'); //Time and date with timezone
            $table->integer('shift_type'); //Day, Night, Vacation
            $table->integer('in_office'); //unknown, in office, out of office.
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
        Schema::dropIfExists('shifts');
    }
}
