<?php

use Illuminate\Database\Seeder;

class NiveauTableSeeder extends Seeder
{

    private static function createNiveau($id, $libelle){
        DB::table('niveau')->insertOrIgnore([
            'id_niveau' => $id,
            'libelle_niveau' => $libelle,
        ]);
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $libelleNiveau = [
            "Licence",
            "Master",
            "Doctorat"
        ];

        for ($i=0; $i < count($libelleNiveau); $i++) {
            self::createNiveau($i+1, $libelleNiveau[$i]);
        }
    }
}
