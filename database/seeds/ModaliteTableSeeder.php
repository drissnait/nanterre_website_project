<?php

use Illuminate\Database\Seeder;

class ModaliteTableSeeder extends Seeder
{

    private static function createModalite($id, $libelle){
        DB::table('modalite')->insertOrIgnore([
            'id_modalite' => $id,
            'libelle_modalite' => $libelle,
        ]);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $libelleModalite = [
            "Classique",
            "Apprentissage",
        ];

        for ($i=0; $i < count($libelleModalite); $i++) {
            self::createModalite($i+1, $libelleModalite[$i]);
        }
    }
}
