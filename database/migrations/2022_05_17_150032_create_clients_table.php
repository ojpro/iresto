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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
			$table->string('first_name',100);
			$table->string('last_name',100);
			$table->string('number',15);
			$table->string('address',250);
			$table->date('birthday');
			$table->enum('gender', ['male','female','none']);
			$table->string('email',200);
			$table->string('username',200);
			$table->string('password',250);
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
        Schema::dropIfExists('clients');
    }
};
