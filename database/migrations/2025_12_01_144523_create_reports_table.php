<?php

// database/migrations/2024_01_01_000600_create_reports_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservation_id')->constrained()->cascadeOnDelete();
            $table->foreignId('reported_user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('reporter_id')->constrained('users')->cascadeOnDelete();
            $table->string('motif');
            $table->text('details')->nullable();
            $table->enum('statut', ['en_attente', 'traite'])->default('en_attente');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('reports');
    }
};