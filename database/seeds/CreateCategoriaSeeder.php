<?php

use App\Categoria;
use Illuminate\Database\Seeder;

class CreateCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [
            'nome' => 'Muay Thai'        ];

        $create = Categoria::where('nome', $dados['nome'])->get()->count() == 0;

        if ($create) {
            Categoria::create($dados);
        }
    }
}
