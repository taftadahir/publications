<?php

use App\Laboratoire;
use Illuminate\Database\Seeder;

class LaboratoireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Laboratoire::create([
            'nom_laboratoire'=>'Centre de Recherche en Sciences de Gestion (CRSG)',
            'etablissement_id'=>1,
            'directeur_labo'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Laboratoire::create([
            'nom_laboratoire'=>'Laboratoire de recherche en Management, Marketing et Communication',
            'etablissement_id'=>1,
            'directeur_labo'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Laboratoire::create([
            'nom_laboratoire'=>"Laboratoire de Recherche en Finance, Audit et Gouvernance d'Organisation",
            'etablissement_id'=>1,
            'directeur_labo'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Laboratoire::create([
            'nom_laboratoire'=>"Laboratoire de Recherche d’Etudes en Finance, Comptabilité, Gestion et Systèmes d’Information et d’Aide à la Décision",
            'etablissement_id'=>1,
            'directeur_labo'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Laboratoire::create([
            'nom_laboratoire'=>"Laboratoire de Recherche en Stratégie et Management des Organisations",
            'etablissement_id'=>1,
            'directeur_labo'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Laboratoire::create([
            'nom_laboratoire'=>"Laboratoire de Recherche en Management et Développement",
            'etablissement_id'=>2,
            'directeur_labo'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Laboratoire::create([
            'nom_laboratoire'=>"Laboratoire de Recherche en Economie Théorique et Appliquée",
            'etablissement_id'=>2,
            'directeur_labo'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Laboratoire::create([
            'nom_laboratoire'=>"Laboratoire de Recherche en dynamiques sécuritaires",
            'etablissement_id'=>2,
            'directeur_labo'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Laboratoire::create([
            'nom_laboratoire'=>"Laboratoire de Recherche en transition démocratique",
            'etablissement_id'=>2,
            'directeur_labo'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Laboratoire::create([
            'nom_laboratoire'=>"Laboratoire de Recherche en modélisation mathématique et calcul économique",
            'etablissement_id'=>2,
            'directeur_labo'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Laboratoire::create([
            'nom_laboratoire'=>"Laboratoire de Recherche en économie, gestion management des affaires",
            'etablissement_id'=>2,
            'directeur_labo'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Laboratoire::create([
            'nom_laboratoire'=>"مختبر بحث قانون الأعمال",
            'etablissement_id'=>2,
            'directeur_labo'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Laboratoire::create([
            'nom_laboratoire'=>"Laboratoire de recherche sur la Gouvernance et le développement durable",
            'etablissement_id'=>2,
            'directeur_labo'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Laboratoire::create([
            'nom_laboratoire'=>"Laboratoire de recherche des Sciences et Technologie de la Santé (LSTS)",
            'etablissement_id'=>3,
            'directeur_labo'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Laboratoire::create([
            'nom_laboratoire'=>"Laboratoire Interdisciplinaire des Sciences Appliquées (LISA)",
            'etablissement_id'=>4,
            'directeur_labo'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Laboratoire::create([
            'nom_laboratoire'=>"Laboratoire d’Analyse et Modélisation des Systèmes et Aide à la décision (LAMSAD)",
            'etablissement_id'=>4,
            'directeur_labo'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Laboratoire::create([
            'nom_laboratoire'=>"Laboratoire Agroalimentaire et Santé",
            'etablissement_id'=>5,
            'directeur_labo'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Laboratoire::create([
            'nom_laboratoire'=>"Laboratoire Biochimie, Neurosciences, Ressources Naturelles et Environnent",
            'etablissement_id'=>5,
            'directeur_labo'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Laboratoire::create([
            'nom_laboratoire'=>"Laboratoire Chimie Appliquée et Environnement",
            'etablissement_id'=>5,
            'directeur_labo'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Laboratoire::create([
            'nom_laboratoire'=>"Laboratoire Ingénierie, Management Industriel et Innovation",
            'etablissement_id'=>5,
            'directeur_labo'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Laboratoire::create([
            'nom_laboratoire'=>"Laboratoire Mathématiques, Informatique et Sciences de l’Ingénieur",
            'etablissement_id'=>5,
            'directeur_labo'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Laboratoire::create([
            'nom_laboratoire'=>"Laboratoire Mécanique, Informatique, Electronique Télécommunications",
            'etablissement_id'=>5,
            'directeur_labo'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Laboratoire::create([
            'nom_laboratoire'=>"Laboratoire Physico - Chimie des Procédés et des Matériaux",
            'etablissement_id'=>5,
            'directeur_labo'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Laboratoire::create([
            'nom_laboratoire'=>"Laboratoire Rayonnement-Matière et Instrumentation",
            'etablissement_id'=>5,
            'directeur_labo'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Laboratoire::create([
            'nom_laboratoire'=>"Laboratoire Recherche en Veille des Technologies Emergentes",
            'etablissement_id'=>5,
            'directeur_labo'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Laboratoire::create([
            'nom_laboratoire'=>"Laboratoire Informatique, Réseaux, Mobilité et Modélisation",
            'etablissement_id'=>5,
            'directeur_labo'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Laboratoire::create([
            'nom_laboratoire'=>"Laboratoire de Recherche en ingénierie didactique, entreprenariat, art et littérature ",
            'etablissement_id'=>6,
            'directeur_labo'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
