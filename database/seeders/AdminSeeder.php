<?php
// database/seeders/AdminSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nom' => 'Super Admin',
            'email' => 'admin@fub.com',
            'password' => Hash::make('admin123'), // mot de passe sécurisé
            'role' => 'admin',
        ]);
    }
}
