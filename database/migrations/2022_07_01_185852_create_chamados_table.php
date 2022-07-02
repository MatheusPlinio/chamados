<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChamadosTable extends Migration
{
    public function up()
    {
        Schema::create('chamados', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 100);
            $table->text('solicitacao');
            $table->enum('status', ['Pendente'])->default('Pendente');
            $table->enum('prioridade', ['Baixa', 'Média', 'Alta']);
            $table->string('solicitante', 50);
            $table->string('setor', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chamados');
    }
}
