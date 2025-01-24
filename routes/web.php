<?php

use App\Models\Product;
use App\Livewire\ProductFilter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/products', ProductFilter::class)->name('products.index');
// Route::get('/products', App\Livewire\Pages\Products\ProductList::class)->name('products.list');
// Route::get('/products/{product}', App\Livewire\Pages\Products\ProductDetail::class)->name('products.detail');

Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', App\Livewire\Pages\Products\ProductList::class)->name('list');
    Route::get('/{product}', App\Livewire\Pages\Products\ProductDetail::class)->name('detail');
});

// Route::get('/', function () {
//     $query = Product::with(['category', 'colors', 'materials']);

//     // Hardcoded filter values
//     $selectedCategories = [1, 2];
//     $selectedColors = [1];
//     $selectedMaterials = [3];

//     $query->whereIn('category_id', $selectedCategories);
//     $query->whereHas('colors', fn($q) => $q->whereIn('colors.id', $selectedColors));
//     $query->whereHas('materials', fn($q) => $q->whereIn('materials.id', $selectedMaterials));

//     dd([
//         'Applied Filters' => [
//             'Categories' => $selectedCategories,
//             'Colors' => $selectedColors,
//             'Materials' => $selectedMaterials
//         ],
//         'SQL Query' => $query->toSql(),
//         'Products Found' => $query->get()->map(fn($product) => [
//             'id' => $product->id,
//             'name' => $product->name,
//             'category' => $product->category->name,
//             'colors' => $product->colors->pluck('name'),
//             'materials' => $product->materials->pluck('name')
//         ])
//     ]);
// });
