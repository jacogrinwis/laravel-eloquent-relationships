<section
    {{ $attributes->merge(['class' => 'grid aspect-[3/4] grid-cols-1 grid-rows-4 gap-4 bg-black sm:aspect-[4/3] sm:grid-cols-4 sm:grid-rows-1 md:aspect-[3/4] md:grid-cols-1 md:grid-rows-4 lg:aspect-[4/3] lg:grid-cols-4 lg:grid-rows-1']) }}
>
    {{ $slot }}
</section>
