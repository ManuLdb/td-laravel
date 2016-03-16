<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vide la base de données
        //App\Models\User::truncate();

        // Créer 20 utilisateurs
        factory(\App\Models\User::class, 20)->create();

    }
}
