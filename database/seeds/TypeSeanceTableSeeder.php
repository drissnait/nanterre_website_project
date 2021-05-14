<?php

use Illuminate\Database\Seeder;

class TypeSeanceTableSeeder extends Seeder
{

    private static function create($id, $libelle){
        DB::table('type_seance')->insertOrIgnore([
            'id_type_seance' => $id,
            'libelle_type_seance' => $libelle,
        ]);
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $libelle = [
            "CM",
            "TD",
            "EXAM",
            "VISIO"
        ];

        for ($i=0; $i < count($libelle); $i++) {
            self::create($i+1, $libelle[$i]);
        }
    }
}
