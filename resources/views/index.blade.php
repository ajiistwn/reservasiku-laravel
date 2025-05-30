@php
    $currentUrlWithQuery = url()->full(); // misal "/?search=villa&page=2"
@endphp
<x-layouts.app>
    {{-- start home --}}
    <section id="home" class="relative px-6 isolate pt-14 lg:px-8 bg-center bg-no-repeat bg-[url('/public/img/homeImage.jpeg')] bg-gray-400 bg-cover bg-blend-multiply py-30 ">
        <div class="max-w-2xl py-32 pt-20 mx-auto sm:py-48 lg:py-56 ">

            <div class="text-center">
                <h1 class="text-5xl font-semibold tracking-tight text-white text-balance sm:text-7xl">Reservasiku.com</h1>
                <p class="mt-8 text-lg font-medium text-white text-pretty sm:text-xl/8">Explore all your dreams with peace of mind. With us guaranteed safe, easy and cheap.Enjoy your holliday we ensure your comfort.</p>
            </div>
            <div class="sticky top-0 flex items-center justify-center w-full mt-10 z-100 gap-x-6">
                <form action="{{ request()->fullUrlWithQuery(['page' =>  1]) }}#explore" class="flex flex-col w-full gap-2 p-4 bg-white border border-gray-200 rounded-lg shadow-sm md:justify-center md:flex-row dark:border-gray-700 dark:bg-gray-800 sm:p-6 lg:p-8 " >

                    <div class="md:self-end ">
                        <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
                        <input type="text" id="country" name="country" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Indonesia" required />
                    </div>
                    <div class="md:self-end ">
                        <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                        <input type="text" id="city" name="city" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Bandung" required />
                    </div>
                    <div class="md:w-1/5 md:self-end">
                        <label for="check_in" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Check In </label>
                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3.5">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                fill-rule="evenodd"
                                d="M5 5a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1 2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2ZM3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm6.01-6a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm-10 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z"
                                clip-rule="evenodd"
                                />
                            </svg>
                            </div>
                            <input  id="check_in" type="datetime-local" name="check_in" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 ps-9 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" placeholder="12/23" required />
                        </div>
                    </div>
                    <div class="md:w-1/5 md:self-end">
                        <label for="check_out" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Check In </label>
                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3.5">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                fill-rule="evenodd"
                                d="M5 5a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1 2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2ZM3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm6.01-6a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm-10 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z"
                                clip-rule="evenodd"
                                />
                            </svg>
                            </div>
                            <input  id="check_out" type="datetime-local" name="check_out" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 ps-9 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" placeholder="12/23" required />
                        </div>
                    </div>


                    <div class="mt-5 md:mt-0 md:self-end md:w-1/5">
                        {{-- @dd($properties->count()) --}}
                        <a href="{{ request()->fullUrlWithQuery(['page' =>  1]) }}#property-{{$properties->count()}}">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Explore</button>
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </section>
    {{-- end home --}}
    {{-- start explore --}}
    <section id="explore" class="py-8 pt-20 antialiased bg-gray-50 dark:bg-gray-900 md:py-30 ">
        <div class="max-w-screen-xl px-4 mx-auto min-h-lvh 2xl:px-0">
          <!-- Heading & Filters -->
          <div class="flex flex-col items-center justify-center gap-1 mb-4 space-y-4 sm:flex sm:space-y-0 md:mb-8">
            <h2 class="mb-5 text-4xl font-semibold tracking-tight text-gray-900 text-balance sm:text-4xl">Explore the Accommodation You Want</h2>
            <p>Explore your world with my reservation, you are happy we are calm</p>
          </div>
          {{-- container card --}}
          <div id="container-card" class="grid gap-4 mb-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4 ">
            {{-- card --}}
            @foreach ($properties as $property)
                <x-card-property :property="$property" :loop=$loop />
            @endforeach

          </div>
          <div id="loadin" class="w-full text-center ">
            @if ($properties->hasMorePages())
                <a href="{{ request()->fullUrlWithQuery(['page' => $properties->currentPage() + 1]) }}#property-{{$properties->currentPage() * 8}}">
                    <button  type="button"  class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Show more</button>
                </a>
            @endif
          </div>
        </div>
        <!-- Filter modal -->
    </section>
    {{-- end explore --}}

    {{-- start about us --}}
    <section id="about" class="antialiased bg-white py-30 dark:bg-gray-900 md:py-16">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto md:grid-cols-12 lg:gap-12 lg:pb-56 xl:gap-0">
            <div class="content-center justify-self-start md:col-span-7 md:text-start">
                <h2 class="mb-5 text-4xl font-semibold tracking-tight text-gray-900 text-balance sm:text-4xl">
                    About Us
                </h2>
                <p class="max-w-2xl mb-3 mb-4 text-gray-500 dark:text-gray-400 md:mb-12 md:text-lg lg:mb-5 lg:text-xl">
                    Reservasiku.com is a digital platform that makes it easy for users to book rooms and accommodations quickly, safely, and conveniently. We offer a modern solution for lodging needs from individual rooms in villas to exclusive stays with a smooth and transparent booking experience. To become Indonesia’s leading accommodation booking platform, prioritizing accessibility, user comfort, and exceptional stay experiences.
                </p>

            </div>
            <div class="hidden md:col-span-5 md:mt-0 md:flex">
                <img src="/img/aboutImage.jpg" alt="about image" />

            </div>
        </div>

        </div>
    </section>



</x-layouts.app>


{{-- <script type="text/javascript">

    $(document).ready(function() {
        page = 2;
        $("#load_more").click(function() {

            console.log("oke");
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "{{route('loadmore')}}",
                data: {page: page},
                success: function(respons){

                    page = respons.current_page + 1;

                    respons.data.forEach(property => {
                        const mediaHtml = property.media.map((item, index) => `
                                <div class="duration-700 ease-in-out" data-carousel-item>
                                    <img src="/storage/${item}" class="absolute top-0 left-0 block object-cover w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" />
                                </div>
                            `).join('');

                        const price = property.priceRange.length > 1
                                ? `Rp. ${property.priceRange[0].toLocaleString('id-ID')} - Rp. ${property.priceRange[1].toLocaleString('id-ID')}`
                                : `Rp. ${property.priceRange[0].toLocaleString('id-ID')}`;

                        const availabilityBadge = property.roomAvailable > 0
                            ? `<span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">
                                Available ${property.roomAvailable}
                            </span>`
                            : `<span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">
                                Not Available
                            </span>`;

                            const html = `
                                <div class="my-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800">
                                    <div class="relative w-full" data-carousel="static">
                                        <div class="relative h-56 overflow-hidden rounded-lg md:h-50">
                                            ${mediaHtml}
                                        </div>
                                        <!-- Slider controls bisa ditambahkan jika kamu implementasikan carousel secara manual -->
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
                                            <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-blue-900 dark:text-blue-300">${property.city}, ${property.country}</span>
                                            ${availabilityBadge}
                                        </div>
                                        <a href="/detail/${property.id}" class="block text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">
                                            ${property.name}
                                        </a>
                                        <p>${property.address}</p>
                                        <div class="relative inset-x-0 bottom-0 flex">
                                            <p class="font-extrabold text-gray-900 text-1xl dark:text-white">${price}</p>
                                        </div>
                                    </div>
                                </div>
                                `;
                                $("#container-card").append(html)
                    });
                    const carousels = document.querySelectorAll('[data-carousel="static"]');
                    carousels.forEach(carousel => {
                        new Flowbite.Carousel(carousel); // Inisialisasi ulang Flowbite carousel
                    });
                    // const carousels = document.querySelectorAll('[data-carousel]');
                    // carousels.forEach(el => {
                    //     const instance = new Carousel(el); // Pastikan ini sesuai dengan library carousel yang kamu pakai
                    // });
                    // setTimeout(() => {
                    //     const carousels = document.querySelectorAll('[data-carousel]');
                    //     console.log(carousels); // Cek apakah carousels sudah tersedia
                    //     carousels.forEach(el => {
                    //         const instance = new Carousel(el);
                    //     });
                    // }, 100);


                }
            });

        });
    });
</script> --}}

