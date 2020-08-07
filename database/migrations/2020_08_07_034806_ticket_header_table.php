<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TicketHeaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblticket_header', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cust_id');
            $table->string('tel_no');
            $table->string('inquiry');
            $table->enum('status', ['pending', 'solved'])->default('pending');
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

    }
}
