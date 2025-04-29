
{{-- {{dd($property->rooms);}} --}}
<x-layouts.app>
        <section class="bg-white mt-30 dark:bg-gray-900">
            <div id="indicators-carousel" class="relative max-w-screen-xl px-4 m-auto overvlow-hidden" data-carousel="static">
                <!-- Carousel wrapper -->
                <div class="relative overflow-hidden rounded-lg h-68 md:h-96 xl:h-150">
                    <!-- Item 1 -->
                    @foreach ($property->media as $item)

                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('storage/'.$item) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="{{ $item }}">
                        </div>
                    @endforeach

                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex max-w-md p-1 space-x-2 overflow-x-auto overflow-y-hidden -translate-x-1/2 md:space-x-3 no-scrollbar md:max-w-2/3 rtl:space-x-reverse bottom-5 left-1/2">
                    @foreach ($property->media as $item)
                        <button type="button" class="flex-shrink-0 overflow-hidden transition transform border-2 border-white rounded-sm h-15 w-15 md:h-25 md:w-25 hover:scale-110" aria-current="true" aria-label="Slide {{ $loop->index + 1 }}" data-carousel-slide-to="{{ $loop->index }}">
                            <img class="object-cover w-full h-full" src="{{ asset('storage/'.$item) }}" alt="Rounded avatar">
                        </button>
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


            <div class="max-w-screen-xl px-4 py-8 mx-auto sm:py-8 lg:px-6">
                <div class="max-w-screen-md">
                    <h2 class="mb-4 text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white">{{ $property->name }}</h2>
                    <p class="mb-4 font-light text-gray-500 sm:text-xl dark:text-gray-400">{{$property->description}}</p>
                    <p class="mb-8 font-light text-gray-500 sm:text-xl dark:text-gray-400">
                        {{$property->address}}
                        <br>
                        {{$property->city}}, {{$property->country}}
                    </p>

                </div>
                <div class="grid grid-cols-3 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4">
                    @foreach ($property->facilities as $item)
                        <a href="#" class="flex items-center gap-1 px-1 py-1 bg-white border border-gray-100 rounded-lg hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <i data-lucide="{{ $item->icon }}" class="w-4 xl:w-5"></i>
                            <span class="text-[12px] xl:text-[14px] text-gray-900 dark:text-white">{{ $item->name }}</span>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="flex items-center justify-between max-w-screen-xl px-4 py-4 mx-auto sm:py-8 lg:px-6">
                <div class="-my-6 divide-y divide-gray-200 dark:divide-gray-800">
                    @foreach ($property->rooms as $room)

                        <div class="flex flex-col md:flex-row">
                            <div id="indicators-carousel" class="relative px-4 m-auto md:border-gray-200 md:border-r-1 w-100 overvlow-hidden" data-carousel="static">
                                <!-- Carousel wrapper -->
                                <div class="relative overflow-hidden rounded-lg h-60 md:h-50 xl:h-56">
                                    <!-- Item 1 -->
                                    @foreach ($room->media as $item)

                                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                            <img src="{{ asset('storage/'.$item) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="{{ $item }}">
                                        </div>
                                    @endforeach

                                </div>
                                <!-- Slider indicators -->
                                <div class="absolute z-30 flex max-w-xs p-1 space-x-1 overflow-x-auto overflow-y-hidden -translate-x-1/2 md:space-x-2 no-scrollbar md:max-w-3/4 rtl:space-x-reverse bottom-5 left-1/2">
                                    @foreach ($room->media as $item)
                                        <button type="button" class="flex-shrink-0 overflow-hidden transition transform border-2 border-white rounded-sm h-15 w-15 md:h-10 md:w-10 xl:h-15 xl:w-15 hover:scale-110" aria-current="true" aria-label="Slide {{ $loop->index + 1 }}" data-carousel-slide-to="{{ $loop->index }}">
                                            <img class="object-cover w-full h-full" src="{{ asset('storage/'.$item) }}" alt="Rounded avatar">
                                        </button>
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

                            <div class="px-4 py-6 space-y-4 md:py-8 dark:divide-gray-800">
                                <div class="grid gap-4">
                                    <div class="flex flex-wrap items-center gap-2">
                                        @if ($room->unit - $room->reservations->count() > 0 )
                                            <span class="inline-block rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300 md:mb-0">Availible {{$room->unit - $room->reservations->count()}} </span>
                                        @endif
                                        @if ($room->reservations->count() > 0)
                                            <span class="inline-block rounded bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300 md:mb-0">Reserved {{$room->reservations->count()}} </span>
                                        @endif
                                        @if ($room->unit - $room->reservations->count() < 1 )
                                            <span class="inline-block rounded bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800 dark:bg-red-900 dark:text-red-300 md:mb-0"> Not Availble </span>
                                        @endif
                                    </div>

                                    <a href="#" class="text-xl font-semibold text-gray-900 hover:underline dark:text-white">{{$room->name}}</a>
                                </div>
                                <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{$room->description}}</p>
                                <div class="flex gap-10">
                                    <div class="grid grid-cols-3 gap-4 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-5">
                                        @foreach ($room->facilities as $item)
                                            <a href="#" class="flex items-center gap-1 px-1 py-1 bg-white border border-gray-100 rounded-lg hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <i data-lucide="{{ $item->icon }}" class="w-3 xl:w-4"></i>
                                                <span class="text-[10px] xl:text-[12px]  text-gray-900 dark:text-white">{{ $item->name }}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                    <div class="flex flex-col items-start justify-end gap-2 border-gray-200 border-l-1 border-t-1 ps-5">
                                        <p class="font-bold text-normal ">Price</p>
                                        <p>
                                            Rp.{{$room->price}}
                                            <br>
                                            /Night
                                        </p>
                                        <button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Choice</button>

                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
              </div>
        </section>
</x-layouts.app>
