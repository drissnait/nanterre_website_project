<?php

use Illuminate\Database\Seeder;

class FormationAndComposanteSeeder extends Seeder
{


    private static function createComposante($id, $libelle){
        DB::table('composante')->insertOrIgnore([
            'id_composante' => $id,
            'libelle_composante' => $libelle,
        ]);
    }

    private static function createFormation($id, $libelle){
        DB::table('formation')->insertOrIgnore([
            'id_formation' => $id,
            'vet' => 1,
            'libelle_formation' => $libelle,
        ]);
    }

    private static function createFormationComposante($fidFormation, $fvet, $fidComposante){
        DB::table('formation_composante')->insertOrIgnore([
            'fid_formation' => $fidFormation,
            'f_vet' => $fvet,
            'fid_composante' => $fidComposante,
        ]);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $libelleComposantes = [
            "SEGMI",
            "STAPS",
            "DROIT",
            "LANGUES",
            "PHILOSOPHIE",
            "ART",
            "PSYCHOLOGIE",
        ];

        $libelleFormations = [
            "MIAGE",
            "MIASHS",
            "Economie",
            "Droit",
            "Informatique",
            "Génie Biologique",
            "Génie Civil",
            "Génie Mécanique Productique",
            "GEA",
            "TC",
        ];

        for ($i=0; $i < count($libelleComposantes); $i++) {
            self::createComposante($i+1, $libelleComposantes[$i]);
        }

        for ($i=0; $i < count($libelleFormations); $i++) {
            self::createFormation($i+1, $libelleFormations[$i]);
        }

        $randMaxRange = count($libelleComposantes) + 1;
        for($i=1; $i <= count($libelleFormations); $i++){
            $idComposante = rand(1, $randMaxRange);
            self::createFormationComposante($i, 1, $idComposante);
        }

    }
}
