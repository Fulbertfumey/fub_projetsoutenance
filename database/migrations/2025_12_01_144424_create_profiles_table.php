<?php

// database/migrations/2024_01_01_000100_create_profiles_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('bio')->nullable();
            $table->string('photo')->nullable();
            $table->json('competences')->nullable(); // ["Plomberie","Électricité"]
            $table->json('disponibilites')->nullable(); // ex: créneaux
            $table->string('document')->nullable(); // fichier PDF/Doc
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('profiles');
    }
};