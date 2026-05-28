<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      // Se não houver nenhuma categoria no banco, cria 5 antes de rodar os produtos
        if (Categoria::count() === 0) {
            Categoria::factory(5)->create();
        }

        // Agora sim, cria os produtos com segurança
        Produto::factory(20)->create();
    }
}
