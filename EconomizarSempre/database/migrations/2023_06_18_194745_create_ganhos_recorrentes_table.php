<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGanhosRecorrentesTable extends Migration
{
    public function up()
    {
        Schema::create('ganhos_recorrentes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users');
             $table->decimal('valor', 10, 2);
            $table->enum('frequencia', ['diaria', 'semanal', 'mensal']);
            $table->date('data_inicio');
            $table->date('data_termino')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ganhos_recorrentes');
    }
};


