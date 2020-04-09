<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CeateEmployeesPenaltiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('employees_penalties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comment');
            $table->string('expire');
            $table->timestamps();
            $table->integer('behavior_id')-> unsigned();
            $table->integer('employee_id')-> unsigned();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
