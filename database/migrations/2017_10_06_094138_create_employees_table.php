<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 32);
            $table->string('last_name', 32);
            $table->string('address_street', 50);
            $table->string('address_town', 32);
            $table->string('address_parish', 32);
            $table->string('address_country', 32);
            $table->date('dob');
            $table->string('email')->unique();
            $table->integer('ssn');
            $table->date('hire_date');
            $table->string('work_location');
            $table->string('wages');
            $table->integer('wages_amount');
            $table->string('vacation');
            $table->date('effective_date');
            $table->integer('vacation_balance');
            $table->string('vacation_type');
            $table->string('vacation_rate');
            $table->date('vacation_date');
            //$table->date('sale_date')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
