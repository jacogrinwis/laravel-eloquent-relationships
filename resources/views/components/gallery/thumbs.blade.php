<div
    {{ $attributes->merge(['class' => 'flex flex-row gap-2 sm:flex-col md:flex-row lg:flex-col order-2 overflow-x-auto overflow-y-hidden sm:overflow-y-auto sm:overflow-x-hidden md:overflow-x-auto md:overflow-y-hidden lg:overflow-y-auto lg:overflow-x-hidden sm:order-1 md:order-3 lg:order-1']) }}>
    {{ $slot }}
</div>
