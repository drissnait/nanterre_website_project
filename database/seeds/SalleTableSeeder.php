<?php

use Illuminate\Database\Seeder;

class SalleTableSeeder extends Seeder
{

    private static function createArray($batiment, $numero_salle, $capacite, $nb_postes, $projecteur){
        $array = [
            'batiment' => $batiment,
            'numero_salle' => $numero_salle,
            'capacite' => $capacite,
            'nb_postes' => $nb_postes,
            'projecteur' => $projecteur
        ];

        return $array;
    }

    private static function create($id, $data){
        DB::table('salle')->insertOrIgnore([
            'id_salle' => $id,
            'batiment' => $data['batiment'],
            'numero_salle' => $data['numero_salle'],
            'capacite' => $data['capacite'],
            'nb_postes' => $data['nb_postes'],
            'projecteur' => $data['projecteur'],
        ]);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $salleListe = [
            self::createArray("A", "100", 30, 15, 1),
            self::createArray("A", "101", 30, 30, 1),
            self::createArray("A", "102", 30, 0, 0),
            self::createArray("A", "103", 30, 0, 1),
            self::createArray("B", "204", 30, 30, 1),
            self::createArray("B", "402", 20, 0, 0),
            self::createArray("G", "103", 25, 0, 1),
        ];

        for ($i=0; $i < count($salleListe); $i++) {
            self::create($i+1, $salleListe[$i]);
        }
    }
}
