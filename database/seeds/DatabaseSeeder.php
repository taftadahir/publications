<?php

use App\Laboratoire;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(EtablissementSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(AuteurSeeder::class);
        $this->call(LaboratoireSeeder::class);
        $this->call(EquipeSeeder::class);
    }
}
