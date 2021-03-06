<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDetialsToAppointmentSchedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointment_schedule', function (Blueprint $table) {
            $table->string('details')->nullable();
            $table->string('time')->nullable();
            $table->string('gender')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointment_schedule', function (Blueprint $table) {
            $table->dropColumn('details');
            $table->dropColumn('gender');
            $table->dropColumn('time');
        });
    }
}
