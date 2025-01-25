<?php

use App\Models\Product;
use App\Livewire\ProductFilter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::prefix('producten')->name('producten.')->group(function () {
    Route::get('/', App\Livewire\Pages\Products\ProductList::class)->name('list');
    Route::get('/{product}', App\Livewire\Pages\Products\ProductDetail::class)->name('detail');
});
