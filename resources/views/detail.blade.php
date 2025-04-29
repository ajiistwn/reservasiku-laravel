
{{-- {{dd($property);}} --}}
<x-layouts.app>
        <section class="bg-white mt-30 dark:bg-gray-900">


            <div id="indicators-carousel" class="relative max-w-screen-xl px-4 m-auto overvlow-hidden" data-carousel="static">
                <!-- Carousel wrapper -->
                <div class="relative overflow-hidden rounded-lg h-100 md:h-96">
                    <!-- Item 1 -->
                    @foreach ($property->media as $item)

                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('storage/'.$item) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="{{ $item }}">
                        </div>
                    @endforeach

                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex max-w-md p-1 space-x-3 overflow-x-auto overflow-y-hidden -translate-x-1/2 no-scrollbar md:max-w-2/3 rtl:space-x-reverse bottom-5 left-1/2">
                    @foreach ($property->media as $item)
                        <button type="button" class="flex-shrink-0 overflow-hidden transition transform border-2 border-white rounded-sm h-25 w-25 hover:scale-110" aria-current="true" aria-label="Slide {{ $loop->index + 1 }}" data-carousel-slide-to="{{ $loop->index }}">
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
                <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    <a href="#" class="flex items-center px-4 py-2 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                      <svg class="w-4 h-4 text-gray-900 me-2 shrink-0 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v5m-3 0h6M4 11h16M5 15h14a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1Z"></path>
                      </svg>
                      <span class="text-sm font-medium text-gray-900 dark:text-white">Computer &amp; Office</span>
                    </a>
                  </div>
            </div>
        </section>
</x-layouts.app>
