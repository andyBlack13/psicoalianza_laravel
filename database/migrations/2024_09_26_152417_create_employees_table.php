<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('identification')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();

            //relaciones
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            
            $table->timestamps();
            //elimina un registro sin borrarlo -> añade delete_at
            $table->softDeletes();
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
