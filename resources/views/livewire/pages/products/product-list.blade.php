@php
    use App\Models\Product;
@endphp

<div class="container mx-auto max-w-7xl p-4">
    <div class="grid grid-cols-4 gap-12">
        <aside class="col-span-1 space-y-6 text-sm">
            @if (count($selectedCategories) > 0 ||
                    count($selectedColors) > 0 ||
                    count($selectedMaterials) > 0 ||
                    count($selectedStockStatuses) > 0)
                <section>
                    <div class="mb-2 flex items-center justify-between">
                        <h3 class="text-lg font-semibold">Actieve filters:</h3>
                        <button
                            wire:click="resetAllFilters"
                            class="text-sm font-semibold text-red-600 hover:text-red-800"
                        >
                            Wis alle filters
                        </button>
                    </div>
                    <div class="flex flex-wrap items-center gap-1">

                        @foreach ($categories->whereIn('id', $selectedCategories) as $category)
                            <button
                                wire:click="removeFilter('categories', {{ $category->id }})"
                                class="flex items-center gap-2 rounded-full bg-gray-100 px-3 py-1"
                            >
                                {{ $category->name }}
                                <svg
                                    class="h-4 w-4"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </button>
                        @endforeach

                        @foreach ($colors->whereIn('id', $selectedColors) as $color)
                            <button
                                wire:click="removeFilter('colors', {{ $color->id }})"
                                class="flex items-center gap-2 rounded-full bg-gray-100 px-3 py-1"
                            >
                                {{ $color->name }}
                                <svg
                                    class="h-4 w-4"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </button>
                        @endforeach

                        @foreach ($materials->whereIn('id', $selectedMaterials) as $material)
                            <button
                                wire:click="removeFilter('materials', {{ $material->id }})"
                                class="flex items-center gap-2 rounded-full bg-gray-100 px-3 py-1"
                            >
                                {{ $material->name }}
                                <svg
                                    class="h-4 w-4"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </button>
                        @endforeach

                        @foreach ($selectedStockStatuses as $status)
                            <button
                                wire:click="removeFilter('stock_status', '{{ $status }}')"
                                class="flex items-center gap-2 rounded-full bg-gray-100 px-3 py-1"
                            >
                                {{ $stockStatusLabels[$status] }}
                                <svg
                                    class="h-4 w-4"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </button>
                        @endforeach
                    </div>
                </section>
            @endif

            <section x-data="{ open: true }">
                <div class="mb-2 flex items-center justify-between">
                    <h4
                        class="flex cursor-pointer items-center gap-2 text-lg font-semibold"
                        @click="open = !open"
                    >
                        <span>Categorieën ({{ $categories->count() }})</span>
                        <svg
                            class="h-5 w-5 transition-transform duration-200"
                            :class="{ 'rotate-180': open }"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            />
                        </svg>
                    </h4>
                    @if (count($selectedCategories) > 0)
                        <button
                            wire:click="$set('selectedCategories', [])"
                            class="text-sm text-red-600 hover:text-red-800"
                        >
                            Reset
                        </button>
                    @endif
                </div>
                <div x-show="open">
                    @foreach ($categories->take($showAllCategories ? 100 : 10) as $category)
                        <div wire:key="category-{{ $category->id }}">
                            <label class="mb-2 flex items-center gap-2">
                                <input
                                    id="category-{{ $category->id }}"
                                    type="checkbox"
                                    class="h-4 w-4 rounded-md border-gray-300"
                                    wire:model.live="selectedCategories"
                                    value="{{ $category->id }}"
                                >
                                {{ $category->name }} ({{ $category->products_count }})
                            </label>
                        </div>
                    @endforeach
                    @if ($categories->count() > 10)
                        <button
                            wire:click="$toggle('showAllCategories')"
                            class="text-sm font-semibold text-blue-600"
                        >
                            {{ $showAllCategories ? 'Toon minder' : 'Toon meer (' . ($categories->count() - 5) . ')' }}
                        </button>
                    @endif
                </div>
            </section>

            <section x-data="{ open: true }">
                <div class="mb-2 flex items-center justify-between">
                    <h4
                        class="flex cursor-pointer items-center gap-2 text-lg font-semibold"
                        @click="open = !open"
                    >
                        <span>Kleuren ({{ $colors->count() }})</span>
                        <svg
                            class="h-5 w-5 transition-transform duration-200"
                            :class="{ 'rotate-180': open }"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            />
                        </svg>
                    </h4>
                    @if (count($selectedColors) > 0)
                        <button
                            wire:click="$set('selectedColors', [])"
                            class="text-sm text-red-600 hover:text-red-800"
                        >
                            Reset
                        </button>
                    @endif
                </div>
                <div x-show="open">
                    @foreach ($colors->take($showAllColors ? 100 : 10) as $color)
                        <div wire:key="color-{{ $color->id }}">
                            <label class="mb-2 flex items-center gap-2">
                                <input
                                    id="color-{{ $color->id }}"
                                    type="checkbox"
                                    class="h-4 w-4 rounded-md border-gray-300"
                                    wire:model.live="selectedColors"
                                    value="{{ $color->id }}"
                                >
                                <span
                                    class="bg-{{ $color->tailwind_color }}{{ !in_array($color->tailwind_color, ['white', 'black']) ? '-500' : '' }} {{ $color->tailwind_color == 'white' ? 'border border-gray-300' : '' }} size-3 rounded-full"
                                ></span>
                                {{ $color->name }} ({{ $color->products_count }})
                            </label>
                        </div>
                    @endforeach
                    @if ($colors->count() > 10)
                        <button
                            wire:click="$toggle('showAllColors')"
                            class="text-sm font-semibold text-blue-600"
                        >
                            {{ $showAllColors ? 'Toon minder' : 'Toon meer (' . ($colors->count() - 5) . ')' }}
                        </button>
                    @endif
                </div>
            </section>

            <section x-data="{ open: true }">
                <div class="mb-2 flex items-center justify-between">
                    <h4
                        class="flex cursor-pointer items-center gap-2 text-lg font-semibold"
                        @click="open = !open"
                    >
                        <span>Materialen ({{ $materials->count() }})</span>
                        <svg
                            class="h-5 w-5 transition-transform duration-200"
                            :class="{ 'rotate-180': open }"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            />
                        </svg>
                    </h4>
                    @if (count($selectedMaterials) > 0)
                        <button
                            wire:click="$set('selectedMaterials', [])"
                            class="text-sm text-red-600 hover:text-red-800"
                        >
                            Reset
                        </button>
                    @endif
                </div>
                <div x-show="open">
                    @foreach ($materials->take($showAllMaterials ? 100 : 10) as $material)
                        <div wire:key="material-{{ $material->id }}">
                            <label class="mb-2 flex items-center gap-2">
                                <input
                                    id="material-{{ $material->id }}"
                                    type="checkbox"
                                    class="h-4 w-4 rounded-md border-gray-300"
                                    wire:model.live="selectedMaterials"
                                    value="{{ $material->id }}"
                                    class="form-check-input"
                                >
                                {{ $material->name }} ({{ $material->products_count }})
                            </label>
                        </div>
                    @endforeach
                    @if ($categories->count() > 10)
                        <button
                            wire:click="$toggle('showAllMaterials')"
                            class="text-sm font-semibold text-blue-600"
                        >
                            {{ $showAllMaterials ? 'Toon minder' : 'Toon meer (' . ($materials->count() - 5) . ')' }}
                        </button>
                    @endif
                </div>
            </section>

            <section x-data="{ open: true }">
                <div class="mb-2 flex items-center justify-between">
                    <h3
                        class="flex cursor-pointer items-center justify-between gap-2 text-lg font-semibold"
                        @click="open = !open"
                    >
                        <span>Beschikbaarheid</span>
                        <span class="flex items-center">
                            <svg
                                class="h-5 w-5 transition-transform duration-200"
                                :class="{ 'rotate-180': open }"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                />
                            </svg>
                        </span>
                    </h3>
                </div>
                <div x-show="open">
                    @foreach ($stockStatuses as $value => $label)
                        <div wire:key="stock-{{ $value }}">
                            <label class="mb-2 flex items-center gap-2">
                                <input
                                    id="stock-{{ $value }}"
                                    type="checkbox"
                                    class="h-4 w-4 rounded-md border-gray-300"
                                    wire:model.live="selectedStockStatuses"
                                    value="{{ $value }}"
                                >
                                {{ $label }} ({{ $stockStatusCounts[$value] ?? 0 }})
                            </label>
                        </div>
                    @endforeach
                </div>
            </section>

        </aside>

        <main class="col-span-3">
            @if (session()->has('message'))
                <div class="hadow-lg mb-6 rounded bg-red-600 p-6 text-white">
                    {{ session('message') }}
                </div>
            @endif
            <div class="mb-6 grid grid-cols-3 gap-6">
                @foreach ($products as $product)
                    <div class="col-md-4">
                        <div
                            class="space-y-2 rounded border border-gray-200 bg-white p-4 shadow-sm transition-all duration-300 hover:scale-105 hover:shadow-lg">
                            <div class="card-body">
                                <a
                                    href="{{ route('products.detail', $product->id) }}"
                                    wire:navigate
                                >
                                    <figure class="relative">
                                        <img
                                            src="{{ asset($product->cover) }}"
                                            alt="{{ $product->name }}"
                                            class="mb-2 aspect-square w-full rounded-md object-cover"
                                        >
                                        <div class="absolute bottom-2 left-2">
                                            @foreach ($product->colors as $color)
                                                <span
                                                    class="bg-{{ $color->tailwind_color }}{{ !in_array($color->tailwind_color, ['white', 'black']) ? '-500' : '' }} inline-block size-5 rounded-full shadow-sm"
                                                ></span>
                                            @endforeach
                                        </div>
                                        {{-- <span
                                            class="absolute left-2 top-2 min-w-10 rounded-full bg-black/50 p-2 text-center text-white"
                                        >
                                            {{ $product->images->count() }}
                                        </span> --}}
                                    </figure>
                                </a>
                                <div class="h-14">
                                    <a
                                        href="{{ route('products.detail', $product->id) }}"
                                        wire:navigate
                                    >
                                        <h2 class="line-clamp-2 text-xl font-semibold">{{ $product->name }}</h2>
                                    </a>
                                </div>
                                <div>
                                    <x-products.stock-status :status="$product->stock_status" />
                                </div>
                                <div class="mb-2 grid h-14 grid-cols-2 gap-2">
                                    <div class="grid items-end">
                                        @if ($product->discount > 0)
                                            <p class="text-base text-gray-500 line-through">
                                                {{ formatPrice($product->price) }}
                                            </p>
                                            <p class="text-xl font-bold text-red-600">
                                                {{ formatPrice($product->discount_price) }}
                                            </p>
                                        @else
                                            <p class="text-xl font-bold">
                                                {{ formatPrice($product->price) }}
                                            </p>
                                        @endif
                                    </div>
                                    <div class="grid items-end justify-end">
                                        <div class="relative">
                                            <div class="relative z-20">
                                                <x-products.add-to-cart-button
                                                    @click.prevent.stop
                                                    :id="$product->id"
                                                    :disabled="$product->stock_status === 'out_of_stock' ? true : false"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $products->links() }}
        </main>
    </div>
</div>
