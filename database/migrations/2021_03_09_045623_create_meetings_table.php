<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->date('tanggal');
            $table->time('waktu_mulai', $precision = 0);
            $table->time('waktu_akhir', $precision = 0);
            $table->string('place');
            $table->string('leader');
            $table->string('minuter');
            $table->timestamp('created_at')->nullable();
            $table->number('created_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meetings');
    }
}
