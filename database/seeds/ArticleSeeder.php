<?php

use App\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::create([
            'titre'=>'Anchoring of sulfur containing alkylphosphonic and semifluorinated alkylphosphonic molecules on a polycrystalline aluminum substrate',
            'type'=>'journal',
            'source'=>'journal',
            'url'=>'https://doi.org/10.1002/sia.2762',
            'date_publication'=>now(),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
