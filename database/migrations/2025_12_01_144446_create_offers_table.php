<?php

// database/migrations/2024_01_01_000300_create_offers_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // auteur
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('titre');
            $table->text('description');
            $table->decimal('prix', 10, 2)->nullable();
            $table->enum('statut', ['en_attente', 'valide', 'refuse'])->default('en_attente');
            $table->unsignedInteger('vues')->default(0);
            $table->unsignedInteger('clics')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('offers');
    }
};