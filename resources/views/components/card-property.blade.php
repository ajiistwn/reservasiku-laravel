<div id="property-{{ $loop->iteration }}" class="bg-white border border-gray-200 rounded-lg shadow-sm card dark:border-gray-700 dark:bg-gray-800">
    <div id="controls-carousel" class="relative w-full" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-50">
             <!-- Item 1 -->
             {{-- @dump($property->media) --}}
             @foreach ($property->media as $item)
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset( 'storage/' . $item) }}" class="absolute top-0 left-0 block object-cover w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="{{$item}}" />
                </div>
             @endforeach
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer start-0 group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer end-0 group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
    <div class="flex flex-col h-full px-5 py-4">
        <div class="my-1">
            <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-blue-900 dark:text-blue-300"> {{$property->city}}, {{$property->country}}</span>
            @if ($property->unit_available !== 0)
                <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">
                    Available {{ $property->unit_available }}
                </span>
            @else
                <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">
                    Not Available
                </span>
            @endif
        </div>
        <a href="{{route('detail', ['id' => $property->id])}}" class="block text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">
            {{ $property->name }}
        </a>
        <p>{{$property->address}}</p>
        {{-- {{dd($property->priceRange);}} --}}
        <div class="relative inset-x-0 bottom-0 flex ">
            <p class="font-extrabold text-gray-900 text-1xl dark:text-white">
                @if (is_array($property->price_range))
                    {{
                        count($property->price_range) > 1 ? "Rp." . number_format($property->price_range[0], 0, ',', '.').' - '."Rp." . number_format($property->price_range[1], 0, ',', '.') : "Rp." . number_format($property->price_range[0], 0, ',', '.')
                    }}

                @endif

            </p>
        </div>

    </div>
</div>
