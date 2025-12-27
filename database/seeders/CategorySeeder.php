<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['nom' => 'Services domestiques', 'description' => 'Aide ménagère, garde enfants...']);
        Category::create(['nom' => 'Services étudiants', 'description' => 'Cours particuliers, aide aux devoirs...']);
        Category::create(['nom' => 'Services techniques', 'description' => 'Réparations, taille des garsons et autre']);
        Category::create(['nom' => 'Autres', 'description' => 'Divers services']);
    }
}
