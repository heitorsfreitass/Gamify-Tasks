<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_rewards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relacionado ao usuário
            $table->integer('points')->default(0); // Pontos acumulados
            $table->string('medal')->nullable(); // Medalha alcançada (ex: Bronze, Prata, Ouro)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_rewards');
    }
};
