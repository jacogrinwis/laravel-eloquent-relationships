<div class="container mx-auto max-w-7xl p-4">
    <main>
        {{-- <div>
            <h2 class="mb-4 text-3xl font-bold">{{ $product->name }}</h2>
        </div> --}}
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-7">
                {{-- <figure>
                    <img
                        src="{{ asset($product->cover) }}"
                        alt="{{ $product->name }}"
                        class="mb-2 aspect-square w-full rounded-md object-cover"
                    />
                </figure> --}}


                <div
                    x-data="{
                        activeIndex: 0,
                        images: [
                            @foreach ($product->images as $image) '{{ asset($image->url) }}', @endforeach
                        ],
                        next() {
                            this.activeIndex = (this.activeIndex + 1) % this.images.length;
                        },
                        prev() {
                            this.activeIndex = (this.activeIndex - 1 + this.images.length) % this.images.length;
                        }
                    }"
                    class="grid aspect-[3/4] grid-cols-1 grid-rows-4 gap-4 sm:aspect-[4/3] sm:grid-cols-4 sm:grid-rows-1 md:aspect-[3/4] md:grid-cols-1 md:grid-rows-4 lg:aspect-[4/3] lg:grid-cols-4 lg:grid-rows-1"
                >
                    <div
                        class="_xl:order-1 _xl:col-span-1 _xl:row-span-3 relative order-1 col-span-1 row-span-3 aspect-square sm:order-2 sm:col-span-3 sm:row-span-1 md:order-1 md:col-span-1 md:row-span-3 lg:order-2 lg:col-span-3 lg:row-span-1">
                        <img
                            :src="images[activeIndex]"
                            alt="{{ $product->name }}"
                            class="aspect-square size-full rounded object-cover shadow-md"
                        >
                        <button
                            @click="prev"
                            class="absolute left-2 top-1/2 -translate-y-1/2 transform rounded-full bg-black bg-opacity-50 p-2 text-white transition-opacity hover:bg-opacity-75"
                        >
                            <svg
                                class="h-6 w-6"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 19l-7-7 7-7"
                                ></path>
                            </svg>
                        </button>
                        <button
                            @click="next"
                            class="absolute right-2 top-1/2 -translate-y-1/2 transform rounded-full bg-black bg-opacity-50 p-2 text-white transition-opacity hover:bg-opacity-75"
                        >
                            <svg
                                class="h-6 w-6"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7"
                                ></path>
                            </svg>
                        </button>
                        <div class="absolute bottom-2 left-0 right-0 flex justify-center">
                            <template
                                x-for="(image, index) in images"
                                :key="index"
                            >
                                <button
                                    @mouseenter="activeIndex = index"
                                    :class="{
                                        'bg-white': activeIndex === index,
                                        'bg-white/25 hover:bg-white': activeIndex !==
                                            index
                                    }"
                                    class="mx-1 h-4 w-4 rounded-full border-2 border-white/50 ring-2 ring-black/10 focus:outline-none"
                                >
                                </button>
                            </template>
                        </div>
                    </div>
                    <div
                        class="_xl:order-2 _xl:flex-row _xl:overflow-x-auto _xl:overflow-y-hidden order-2 flex flex-row gap-4 overflow-x-auto overflow-y-hidden sm:order-1 sm:flex-col sm:overflow-y-auto sm:overflow-x-hidden md:order-2 md:flex-row md:overflow-x-auto md:overflow-y-hidden lg:order-1 lg:flex-col lg:overflow-y-auto lg:overflow-x-hidden">
                        @foreach ($product->images as $index => $image)
                            <div class="aspect-square shrink-0">
                                <img
                                    src="{{ asset($image->url) }}"
                                    @mouseenter="activeIndex = {{ $index }}"
                                    alt="{{ $product->name }}"
                                    class="aspect-square size-full cursor-pointer rounded-lg border object-cover shadow-md"
                                >
                            </div>
                        @endforeach
                    </div>
                </div>



            </div>
            <div class="col-span-5 space-y-6 rounded border p-6 shadow-sm">
                <div>
                    <div>
                        <h2 class="mb-2 text-2xl font-bold">{{ $product->name }}</h2>
                    </div>
                    <div>
                        <x-products.ratings />
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
                <button
                    class="{{ $product->stock_status === 'out_of_stock' || $product->stock_status === 'coming_soon' ? 'opacity-50 cursor-not-allowed' : '' }} w-full rounded-md bg-blue-600 px-2 py-1.5 text-lg font-semibold text-white hover:bg-blue-700"
                    {{ $product->stock_status === 'out_of_stock' || $product->stock_status === 'coming_soon' ? 'disabled' : '' }}
                >
                    In winkelwagen
                </button>
                <div class="space-x-1">
                    @foreach ($product->colors as $color)
                        <span
                            class="bg-{{ $color->tailwind_color }}{{ !in_array($color->tailwind_color, ['white', 'black']) ? '-500' : '' }} {{ !in_array($color->tailwind_color, ['white']) ? '' : 'border border-gray-300' }} inline-block size-6 rounded-full shadow-sm"
                        ></span>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
</div>
