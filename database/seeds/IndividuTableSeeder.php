<?php

use Illuminate\Database\Seeder;

class IndividuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1 ; $i <= 15 ; $i++) {
            DB::table('individu')->insertOrIgnore([
                'id_individu' => $i,
                'arpeg' => 1,
                'nom_individu' => Str::random(10),
                'prenom_individu' => Str::random(10),
                'mail_individu' => Str::random(10).'@gmail.com',
                'tel_individu' => '0123456789',
            ]);
        }
    }
}
