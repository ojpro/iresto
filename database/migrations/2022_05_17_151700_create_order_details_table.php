<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
	        $table->smallInteger('quantity');
	        $table->foreignId('plate_id')->constrained();
			$table->foreignId('client_id')->constrained();
			$table->dateTime('boxed_at');
			$table->dateTime('arrived_at');
			$table->enum('status',['delivered','canceled','pending'])->default('pending');
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
        Schema::dropIfExists('order_details');
    }
};
