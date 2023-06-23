<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGanhosTable extends Migration
{
    public function up()
    {
        Schema::create('ganhos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users');
            $table->decimal('valor', 10, 2);
            $table->date('data');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ganhos');
    }
};
