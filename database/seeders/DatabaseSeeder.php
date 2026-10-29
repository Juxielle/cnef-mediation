<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@cnef.ga'],
            [
                'name' => 'Administrateur Médiation CNEF',
                'password' => Hash::make('CnefGabon2025!'),
            ]
        );

        $this->call([
            TexteReglementaireSeeder::class,
            ActualiteSeeder::class,
            MediationKpiSeeder::class,
            MediationLitigeSeeder::class,
            MediationSaisineTrimestreSeeder::class,
            MediationEtablissementSeeder::class,
        ]);
    }
}
