<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CreateTiposUsuariosSeeder::class);
        $this->call(CreateUserAdminSeeder::class);
    }
}
