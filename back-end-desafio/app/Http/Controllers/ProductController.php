<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'image' => 'required',
            'rating' => 'required',
            // Adicione mais regras de validação conforme necessário
        ]);

        // Cria um novo produto
        $product = new Product();
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->category = $request->input('category');
        $product->image = $request->input('image');
        $product->rating = $request->input('rating');
        
        // Salva o produto no banco de dados
        $product->save();

        return response()->json($product, 201); // Retorna o produto recém-criado com status 201 (Created)
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Produto não encontrado'], 404);
        }
        return response()->json($product);
    }

    public function importProducts()
    {
        // Chamada para o endpoint de listagem de produtos da FakeStore API
        $response = Http::get('https://fakestoreapi.com/products');

        // Verifica se a requisição foi bem sucedida
        if ($response->successful()) {
            // Obtém os produtos da resposta da API
            $products = $response->json();

            // Salva os produtos no banco de dados
            foreach ($products as $productData) {
                $product = new Product();
                $product->title = $productData['title'];
                $product->description = $productData['description'];
                $product->category = $productData['category'];
                $product->image = $productData['image'];
                $product->rating = $productData['rating'];
                $product->save();
            }

            return response()->json(['message' => 'Produtos importados com sucesso']);
        }

        // Em caso de falha na requisição, retorne uma resposta de erro
        return response()->json(['error' => 'Erro ao importar produtos'], $response->status());
    }
}
