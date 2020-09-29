<?php

use App\Etablissement;
use Illuminate\Database\Seeder;

class EtablissementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Etablissement::create([
            'intitule'=>'ENCG',
            'adresse'=>'Adresse ENCG',
            'url'=>'url ENCG',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Etablissement::create([
            'intitule'=>'FSJES',
            'adresse'=>'Adresse FSJES',
            'url'=>'url FSJES',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Etablissement::create([
            'intitule'=>'ISSS',
            'adresse'=>'Adresse ISSS',
            'url'=>'url ISSS',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Etablissement::create([
            'intitule'=>'ENSAB',
            'adresse'=>'Adresse ENSAB',
            'url'=>'url ENSAB',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Etablissement::create([
            'intitule'=>'FSTS',
            'adresse'=>'Adresse FSTS',
            'url'=>'url FSTS',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Etablissement::create([
            'intitule'=>'FLASH',
            'adresse'=>'Adresse FLASH',
            'url'=>'url FLASH',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
