<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(IndividuTableSeeder::class);
        $this->call(FormationAndComposanteSeeder::class);
        $this->call(NiveauTableSeeder::class);
        $this->call(ModaliteTableSeeder::class);
        $this->call(TypeSeanceTableSeeder::class);
        $this->call(SalleTableSeeder::class);
    }
}
