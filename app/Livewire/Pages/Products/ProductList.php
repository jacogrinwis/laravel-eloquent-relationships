<?php

namespace App\Livewire\Pages\Products;

use App\Models\Color;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Material;

class ProductList extends Component
{
    public $selectedCategories = [];
    public $selectedColors = [];
    public $selectedMaterials = [];
    public $selectedStockStatuses = [];

    public $showAllCategories = false;
    public $showAllColors = false;
    public $showAllMaterials = false;

    public function resetAllFilters()
    {
        $this->selectedCategories = [];
        $this->selectedColors = [];
        $this->selectedMaterials = [];
        $this->selectedStockStatuses = [];
    }

    public function removeFilter($type, $id)
    {
        switch ($type) {
            case 'categories':
                $this->selectedCategories = collect($this->selectedCategories)->reject(fn($item) => $item == $id)->values()->toArray();
                break;
            case 'colors':
                $this->selectedColors = collect($this->selectedColors)->reject(fn($item) => $item == $id)->values()->toArray();
                break;
            case 'materials':
                $this->selectedMaterials = collect($this->selectedMaterials)->reject(fn($item) => $item == $id)->values()->toArray();
                break;
            case 'stock_status':
                $this->selectedStockStatuses = collect($this->selectedStockStatuses)->reject(fn($item) => $item == $id)->values()->toArray();
                break;
        }
    }

    public function addToCart($id)
    {
        session()->flash('message', 'Product added to cart! ' . $id);
    }

    public function render()
    {
        $query = Product::select(['id', 'name', 'cover', 'price', 'discount', 'discount_price', 'stock_status', 'category_id'])->with(['category', 'colors', 'materials']);

        $baseQuery = Product::query();

        if (!empty($this->selectedCategories)) {
            $query->whereIn('category_id', $this->selectedCategories);
            $baseQuery->whereIn('category_id', $this->selectedCategories);
        }
        if (!empty($this->selectedColors)) {
            $query->whereHas('colors', fn($q) => $q->whereIn('colors.id', $this->selectedColors));
            $baseQuery->whereHas('colors', fn($q) => $q->whereIn('colors.id', $this->selectedColors));
        }
        if (!empty($this->selectedMaterials)) {
            $query->whereHas('materials', fn($q) => $q->whereIn('materials.id', $this->selectedMaterials));
            $baseQuery->whereHas('materials', fn($q) => $q->whereIn('materials.id', $this->selectedMaterials));
        }
        if (!empty($this->selectedStockStatuses)) {
            $query->whereIn('stock_status', $this->selectedStockStatuses);
            $baseQuery->whereIn('stock_status', $this->selectedStockStatuses);
        }

        $categories = Category::whereHas('products', function ($query) use ($baseQuery) {
            $query->whereIn('products.id', $baseQuery->select('id'));
        })->withCount(['products' => function ($query) use ($baseQuery) {
            $query->whereIn('products.id', $baseQuery->select('id'));
        }])->get();

        $colors = Color::whereHas('products', function ($query) use ($baseQuery) {
            $query->whereIn('products.id', $baseQuery->select('id'));
        })->withCount(['products' => function ($query) use ($baseQuery) {
            $query->whereIn('products.id', $baseQuery->select('id'));
        }])->get();

        $materials = Material::whereHas('products', function ($query) use ($baseQuery) {
            $query->whereIn('products.id', $baseQuery->select('id'));
        })->withCount(['products' => function ($query) use ($baseQuery) {
            $query->whereIn('products.id', $baseQuery->select('id'));
        }])->get();

        $availableStockStatuses = $baseQuery->clone()
            ->select('stock_status')
            ->selectRaw('count(*) as total')
            ->groupBy('stock_status')
            ->having('total', '>', 0)
            ->pluck('total', 'stock_status')
            ->toArray();

        $stockStatuses = collect(Product::STOCK_STATUS)
            ->filter(fn($label, $value) => isset($availableStockStatuses[$value]))
            ->toArray();


        $products = $query->paginate(12);

        return view('livewire.pages.products.product-list', [
            'products' => $products,
            'categories' => $categories,
            'colors' => $colors,
            'materials' => $materials,
            'stockStatuses' => $stockStatuses,
            'stockStatusCounts' => $availableStockStatuses,
            'stockStatusLabels' => Product::STOCK_STATUS,
        ]);
    }
}
