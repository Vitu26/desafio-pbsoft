<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class EstoqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products::create([
            'name' => 'teste1',
            'description' => 'teste descricão',
            'category' => 'teste categoria',
            'value' => 'teste preço',
            'quanty' => 'teste quantidade'
        ]);

        $products::create([
            'name' => 'teste2',
            'description' => 'teste descricão2',
            'category' => 'teste categoria2',
            'value' => 'teste preço2',
            'quanty' => 'teste quantidade2'
        ]);

        $products::create([
            'name' => 'teste3',
            'descriptiono' => 'teste descricão3',
            'categoria' => 'teste categoria3',
            'pvalue' => 'teste preço3',
            'quanty' => 'teste quantidade3'
        ]);
    }
}
