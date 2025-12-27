<?php

// database/migrations/2024_01_01_000400_create_reservations_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('offer_id')->constrained()->cascadeOnDelete();
            $table->foreignId('client_id')->constrained('users')->cascadeOnDelete();
            $table->enum('type', ['reservation', 'demande'])->default('reservation');
            $table->dateTime('date_souhaitee')->nullable();
            $table->enum('statut', ['en_attente', 'accepte', 'refuse', 'termine'])->default('en_attente');
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('reservations');
    }
};