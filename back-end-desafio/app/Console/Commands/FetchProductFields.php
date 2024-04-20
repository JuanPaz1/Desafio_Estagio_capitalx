<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Http\Controllers\FakeStoreController;

class FetchProductFields extends Command
{
    protected $signature = 'fetch:product-fields';
    protected $description = 'Fetch product fields from the FakeStore API';

    public function handle()
    {
        // Chama o método getProductFields do FakeStoreController
        $fakeStoreController = new FakeStoreController();
        $fakeStoreController->getProductFields();
    }
}
