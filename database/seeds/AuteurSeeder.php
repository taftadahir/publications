<?php

use App\Auteur;
use Illuminate\Database\Seeder;

class AuteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Auteur::create([
            'nom'=>'Auteur nom',
            'prenom'=>'Auteur prenom',
            'som'=>'Auteur som',
            'etablissement_id'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
