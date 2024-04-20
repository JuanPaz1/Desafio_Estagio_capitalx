<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Product;

class FakeStoreController extends Controller
{
    public function getProductFields()
    {
        // Chamada para um endpoint que retorna um produto específico
        $response = Http::get('https://fakestoreapi.com/products/1');

        // Verifica se a requisição foi bem sucedida
        if ($response->successful()) {
            // Obtém os dados do produto da resposta da API
            $productData = $response->json();

            // Salva os dados do produto na tabela 'products'
            $product = new Product();
            $product->title = $productData['title'];
            $product->category = $productData['category'];
            $product->price = $productData['price'];
            $product->description = $productData['description'];
            $product->image = $productData['image'];
            $product->rating = $productData['rating'];
            
            dd($product);

            $product->save();
            

            return response()->json(['message' => 'Dados do produto salvos com sucesso']);
        }

        // Em caso de falha na requisição, retorna uma mensagem de erro
        return response()->json(['error' => 'Erro ao obter os campos do produto'], 500);
    }
}
