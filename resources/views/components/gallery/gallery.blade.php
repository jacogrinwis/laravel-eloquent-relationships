{{-- <x-gallery.container>
    <x-gallery.image-wrapper>
        <x-gallery.image />
    </x-gallery.image-wrapper>
    <x-gallery.thumbs
        class="pr-[calc(100%-100%+0.25rem)] sm:pb-[calc(100%-100%+0.25rem)] md:pr-[calc(100%-100%+0.25rem)] lg:pb-[calc(100%-100%+0.25rem)]"
    >
        <x-gallery.image />
        <x-gallery.image />
        <x-gallery.image />
        <x-gallery.image />
        <x-gallery.image />
        <x-gallery.image />
        <x-gallery.image />
        <x-gallery.image />
        <x-gallery.image />
        <x-gallery.image />
    </x-gallery.thumbs>
</x-gallery.container> --}}

{{-- @php
    $w_xs = 'aspect-[3/4] grid-cols-1 grid-rows-4';
    $w_sm = 'sm:aspect-[4/3] sm:grid-cols-4 sm:grid-rows-1';
    $w_md = 'md:aspect-[3/4] md:grid-cols-1 md:grid-rows-4';
    $w_lg = 'lg:aspect-[4/3] lg:grid-cols-4 lg:grid-rows-1';

    $t_xs = 'col-span-3 row-span-1';
    $t_sm = 'col-span-1 row-span-3';
    $t_md = 'col-span-3 row-span-1';
    $t_lg = 'col-span-1 row-span-3';
@endphp --}}

{{-- <section class="{{ $w_xs }} {{ $w_sm }} {{ $w_md }} {{ $w_lg }} grid gap-4 bg-gray-300">
    <div class="col-span-3 row-span-3 bg-red-600">

    </div>
    <div class="{{ $t_xs }} {{ $t_sm }} {{ $t_md }} {{ $t_lg }} bg-green-600">

    </div>
</section> --}}

{{-- <section class="mb-16 grid grid-cols-4 gap-scroll">
    <div class="col-span-3 overflow-x-auto overflow-y-hidden">
        <figure class="aspect-square shrink-0 bg-pink-600"></figure>
        <figure class="aspect-square shrink-0 bg-pink-600"></figure>
        <figure class="aspect-square shrink-0 bg-pink-600"></figure>
        <figure class="aspect-square shrink-0 bg-pink-600"></figure>
        <figure class="aspect-square shrink-0 bg-pink-600"></figure>
    </div>
    <figure class="col-span-1"></figure>
</section> --}}



{{-- @php
    $s_xs = 'aspect-[3/4] grid-cols-1 grid-rows-4 gap-4';
    $s_sm = 'sm:aspect-[4/3] sm:grid-cols-4 sm:grid-rows-1 sm:gap-2';
    $s_md = 'md:aspect-[3/4] md:grid-cols-1 md:grid-rows-4 md:gap-4';
    $s_lg = 'lg:aspect-[4/3] lg:grid-cols-4 lg:grid-rows-1 lg:gap-2';

    $f_xs = 'order-1';
    $f_sm = 'sm:order-2';
    $f_md = 'md:order-1';
    $f_lg = 'lg:order-2';

    $d_xs = 'order-2 col-span-3 row-span-1 flex-row overflow-x-auto overflow-y-hidden pb-2 pr-0';
    $d_sm =
        'sm:order-1 sm:col-span-1 sm:row-span-3 sm:flex-col sm:overflow-y-auto sm:overflow-x-hidden sm:pb-0 sm:pr-2';
    $d_md =
        'md:order-2 md:col-span-3 md:row-span-1 md:flex-row md:overflow-x-auto md:overflow-y-hidden md:pb-2 md:pr-0';
    $d_lg =
        'lg:order-1 lg:col-span-1 lg:row-span-3 lg:flex-col lg:overflow-y-auto lg:overflow-x-hidden lg:pb-0 lg:pr-2';

@endphp

<section class="{{ $s_xs }} {{ $s_sm }} {{ $s_md }} {{ $s_lg }} grid">
    <figure
        class="{{ $f_xs }} {{ $f_sm }} {{ $f_md }} {{ $f_lg }} col-span-3 row-span-3 bg-green-900"
    >

    </figure>
    <div
        class="{{ $d_xs }} {{ $d_sm }} {{ $d_md }} {{ $d_lg }} flex gap-2 scrollbar-thumb-radius-4 scrollbar-width-6">
        <figure class="aspect-square shrink-0 bg-pink-600">img</figure>
        <figure class="aspect-square shrink-0 bg-pink-600">img</figure>
        <figure class="aspect-square shrink-0 bg-pink-600">img</figure>
        <figure class="aspect-square shrink-0 bg-pink-600">img</figure>
        <figure class="aspect-square shrink-0 bg-pink-600">img</figure>
        <figure class="aspect-square shrink-0 bg-pink-600">img</figure>
        <figure class="aspect-square shrink-0 bg-pink-600">img</figure>
        <figure class="aspect-square shrink-0 bg-pink-600">img</figure>
        <figure class="aspect-square shrink-0 bg-pink-600">img</figure>
        <figure class="aspect-square shrink-0 bg-pink-600">img</figure>
    </div>
</section> --}}





{{-- <section class="grid aspect-[3/4] grid-cols-4 grid-rows-1 gap-4 bg-gray-300">
    <div class="col-span-3 row-span-1 bg-green-600">
        <div class="bg-red-600">
            <figure class="block aspect-square size-full bg-gray-900"></figure>
        </div>
    </div>
    <div class="col-span-1 row-span-1 bg-gray-600">
        <div class="flex flex-row gap-2">
            <figure class="aspect-square size-full bg-gray-900"></figure>

        </div>
    </div>
</section> --}}


{{-- pb sm:pr md:pb lg:pb --}}

{{-- sm:pr-[calc(100%-100%+0.25rem)] sm:pb-[calc(100%-100%+0.25rem)]
        md:pr-[calc(100%-100%+0.25rem)] md:pb-[calc(100%-100%+0.25rem)]
        lg:pr-[calc(100%-100%+0.25rem)] lg:pb-[calc(100%-100%+0.25rem)] --}}

{{-- pb-[calc(100%-100%+0.25rem)] pr-[calc(100%-100%+0.25rem)]
        pb-[calc(100%-100%+0.25rem)] pr-[calc(100%-100%+0.25rem)]
        pb-[calc(100%-100%+0.25rem)] pr-[calc(100%-100%+0.25rem)]
        pb-[calc(100%-100%+0.25rem)] pr-[calc(100%-100%+0.25rem)] --}}
