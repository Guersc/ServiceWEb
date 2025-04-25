<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtudiantSeeder extends Seeder
{
    public function run()
    {
        DB::table('etudiants')->insert([
            [
                'nom' => 'NGOY ',
                'post_nom' => 'NGANDU ',
                'prenom' => 'Guerschom ',
                'genre' => 'Masculin',
                'date_naissance' => '2000-01-01',
                'matricule' => '21nn453',
                'email' => 'geurchomngandu@esisalama.com',
                'password' => bcrypt('motdepasse0'),
            ],
            [
                'nom' => 'mbanza',
                'post_nom' => 'kabange ',
                'prenom' => 'Claire',
                'genre' => 'Féminin',
                'date_naissance' => '2001-02-15',
                'matricule' => '20mk002',
                'email' => 'clairembanza@esisalama.com',
                'password' => bcrypt('motdepasse1'),
            ],
            [
                'nom' => 'kasongo',
                'post_nom' => 'mwamba',
                'prenom' => 'Julien',
                'genre' => 'Masculin',
                'date_naissance' => '1999-11-30',
                'matricule' => '20km003',
                'email' => 'julienkasongo@esisalama.com',
                'password' => bcrypt('motdepasse2'),
            ],
        ]);
    }
}