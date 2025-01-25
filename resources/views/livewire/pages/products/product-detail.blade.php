@php
    use Illuminate\Support\Facades\Route;
@endphp

<div class="container mx-auto max-w-7xl p-4">
    @include('partials.header')
    <main>
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-7">
                @include('partials.products.product-images')
            </div>
            <div class="col-span-5 space-y-6 rounded border p-6 shadow-sm">
                <div>
                    <div>
                        <h2 class="mb-2 text-3xl font-bold">{{ $product->name }}</h2>
                    </div>
                    <div>
                        <x-rating :rating="3" />
                        <span class="ml-1 inline-flex h-3 items-center border-l border-gray-400 pl-2 text-gray-400">
                            {{ $product->product_number }}
                        </span>
                    </div>
                </div>
                <div class="grid items-end">
                    @if ($product->discount > 0)
                        <p class="text-xl text-gray-500 line-through">
                            {{ formatPrice($product->price) }}
                        </p>
                        <p class="text-3xl font-bold text-red-600">
                            {{ formatPrice($product->discount_price) }}
                        </p>
                    @else
                        <p class="text-3xl font-bold">
                            {{ formatPrice($product->price) }}
                        </p>
                    @endif
                </div>
                <div>
                    <x-products.stock-status :status="$product->stock_status" />
                </div>
                <div class="flex items-center gap-2">
                    <button
                        class="{{ $product->stock_status === 'out_of_stock' || $product->stock_status === 'coming_soon' ? 'opacity-50 cursor-not-allowed' : '' }} flex grow items-center justify-center space-x-2 rounded-md bg-blue-600 px-2 py-1.5 text-lg font-semibold text-white transition-all duration-300 hover:bg-blue-700"
                        {{ $product->stock_status === 'out_of_stock' || $product->stock_status === 'coming_soon' ? 'disabled' : '' }}
                    >
                        <span>
                            <x-icons.cart class="size-5 text-white" />
                        </span>
                        <span>In winkelwagen</span>
                    </button>
                    <button
                        class="group inline-flex h-10 items-center rounded-md bg-white text-lg font-semibold transition-all duration-300"
                    >
                        <x-icons.solid.hart
                            class="size-8 stroke-gray-500 text-transparent transition-all duration-300 group-hover:stroke-red-500 group-hover:text-red-500"
                        />
                    </button>
                </div>
                <div class="space-x-1">
                    <h4 class="mb-1 text-base font-semibold">Kleur:</h4>
                    @foreach ($product->colors as $color)
                        <span
                            class="bg-{{ $color->tailwind_color }}{{ !in_array($color->tailwind_color, ['white', 'black']) ? '-500' : '' }} {{ !in_array($color->tailwind_color, ['white']) ? '' : 'border border-gray-300' }} inline-block size-6 rounded-full shadow-sm"
                        ></span>
                    @endforeach
                </div>

                <div>
                    <h4 class="mb-1 text-base font-semibold">Materiaal:</h4>
                    <div>
                        @foreach ($product->materials as $material)
                            {{ $material->name }}{{ !$loop->last ? ',' : '' }}
                        @endforeach
                    </div>
                </div>

                {{-- <div
                    class="grid aspect-[3/4] grid-cols-1 grid-rows-4 gap-4 bg-black sm:aspect-[4/3] sm:grid-cols-4 sm:grid-rows-1 md:aspect-[3/4] md:grid-cols-1 md:grid-rows-4 lg:aspect-[4/3] lg:grid-cols-4 lg:grid-rows-1">
                    <div>
                        <span class="aspect-square size-full bg-gray-600"></span>
                    </div>
                    <div class="flex-row gap-2 sm:flex-col md:flex-row lg:flex-col">
                        <span class="aspect-square size-full bg-gray-600"></span>
                        <span class="aspect-square size-full bg-gray-600"></span>
                        <span class="aspect-square size-full bg-gray-600"></span>
                        <span class="aspect-square size-full bg-gray-600"></span>
                        <span class="aspect-square size-full bg-gray-600"></span>
                    </div>
                </div> --}}


            </div>
        </div>
    </main>
</div>
