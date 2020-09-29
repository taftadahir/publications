<?php

use App\Equipe;
use Illuminate\Database\Seeder;

class EquipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Equipe::create([
            'nom_equipe'=>'Equipe 1',
            'laboratoire_id'=>1,
            'responsable'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
