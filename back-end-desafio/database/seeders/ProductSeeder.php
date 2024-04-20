<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $response = Http::get('https://fakestoreapi.com/products');

        $products = $response->json();
    

        foreach ($products as $productData) {
            // Verifica se a chave 'rating_count' existe no array $productData
            $ratingCount = isset($productData['rating_count']) ? $productData['rating_count'] : null;

            // Remove os campos 'rating' e 'rating_count' dos dados do produto
            unset($productData['rating']);
            unset($productData['rating_count']);

            // Cria o produto no banco de dados
            Product::create($productData);
                
            ;
        }
    }
}