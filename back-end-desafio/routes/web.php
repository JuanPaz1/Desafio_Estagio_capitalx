<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FakeStoreController;

Route::get('/products', [ProductController::class, 'index']); // Endpoint para listar todos os produtos
Route::post('/products', [ProductController::class, 'store']); // Endpoint para criar um novo produto
Route::get('/products/{id}', [ProductController::class, 'show']); // Endpoint para mostrar detalhes de um produto específico


Route::get('/get-product-fields', [FakeStoreController::class, 'getProductFields']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-database', function () {
    try {
        DB::connection()->getPdo();
        return 'Conexão com o banco de dados estabelecida!';
    } catch (\Exception $e) {
        return 'Erro ao conectar ao banco de dados: ' . $e->getMessage();
    }
});



Route::get('/import-products', [ProductController::class, 'importProducts'])->name('import.products');
