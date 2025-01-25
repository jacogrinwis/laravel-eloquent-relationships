<div class="flex items-center space-x-2">
    <div class="flex items-center space-x-1">
        @for ($i = 1; $i <= $maxRating; $i++)
            @if ($readonly)
                <span class="transform cursor-default text-2xl">
                @else
                    <div class="relative">
                        {{-- Invisible buttons positioned absolute over the star --}}
                        <div class="absolute inset-0 flex">
                            <button
                                wire:click="setRating({{ $i - 0.5 }})"
                                class="h-full w-1/2"
                            ></button>
                            <button
                                wire:click="setRating({{ $i }})"
                                class="h-full w-1/2"
                            ></button>
                        </div>
            @endif
            {{-- Star SVG --}}
            @if ($i <= $rating)
                <svg
                    class="text-primary-400 size-5"
                    fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                >
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.54 4.737a1 1 0 00.95.69h4.973c.969 0 1.371 1.24.588 1.81l-4.02 2.92a1 1 0 00-.364 1.118l1.54 4.737c.3.921-.755 1.688-1.54 1.118l-4.02-2.92a1 1 0 00-1.176 0l-4.02 2.92c-.784.57-1.838-.197-1.54-1.118l1.54-4.737a1 1 0 00-.364-1.118L2.098 9.164c-.783-.57-.381-1.81.588-1.81h4.973a1 1 0 00.95-.69L9.049 2.927z"
                    />
                </svg>
            @elseif ($i - 0.5 <= $rating)
                <svg
                    class="text-primary-400 size-5"
                    fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                >
                    <defs>
                        <linearGradient id="half-{{ $i }}">
                            <stop
                                offset="50%"
                                stop-color="currentColor"
                            />
                            <stop
                                offset="50%"
                                stop-color="#D1D5DB"
                            />
                        </linearGradient>
                    </defs>
                    <path
                        fill="url(#half-{{ $i }})"
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.54 4.737a1 1 0 00.95.69h4.973c.969 0 1.371 1.24.588 1.81l-4.02 2.92a1 1 0 00-.364 1.118l1.54 4.737c.3.921-.755 1.688-1.54 1.118l-4.02-2.92a1 1 0 00-1.176 0l-4.02 2.92c-.784.57-1.838-.197-1.54-1.118l1.54-4.737a1 1 0 00-.364-1.118L2.098 9.164c-.783-.57-.381-1.81.588-1.81h4.973a1 1 0 00.95-.69L9.049 2.927z"
                    />
                </svg>
            @else
                <svg
                    class="size-5 text-gray-300"
                    fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                >
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.54 4.737a1 1 0 00.95.69h4.973c.969 0 1.371 1.24.588 1.81l-4.02 2.92a1 1 0 00-.364 1.118l1.54 4.737c.3.921-.755 1.688-1.54 1.118l-4.02-2.92a1 1 0 00-1.176 0l-4.02 2.92c-.784.57-1.838-.197-1.54-1.118l1.54-4.737a1 1 0 00-.364-1.118L2.098 9.164c-.783-.57-.381-1.81.588-1.81h4.973a1 1 0 00.95-.69L9.049 2.927z"
                    />
                </svg>
            @endif
            @if ($readonly)
                </span>
            @else
    </div>
    {{-- @endif --}}
    {{-- @endfor --}}
</div>
{{-- <span class="text-sm text-gray-600">
    <span class="font-bold">{{ number_format($rating, 1) }}</span> ({{ $reviewCount }} reviews)
</span>
</div> --}}
