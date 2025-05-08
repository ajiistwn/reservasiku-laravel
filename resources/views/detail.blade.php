<x-layouts.app>
        <section class="bg-white mt-30 dark:bg-gray-900">
            <div id="indicators-carousel" class="relative max-w-screen-xl px-4 m-auto overflow-hidden" data-carousel="static">
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
                            <div id="indicators-carousel" class="relative px-4 m-auto overflow-hidden md:border-gray-200 md:border-r-1 w-100" data-carousel="static">
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
                                        {{-- @dump($property->address) --}}
                                        <button
                                            id="defaultModalButton"
                                            type="button"
                                            class="btn-reserve text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                                            data-modal-target="defaultModal"
                                            data-modal-toggle="defaultModal"
                                            data-property-name="{{ $property->name }}"
                                            data-property-address="{{$property->address}}"
                                            data-property-country="{{ $property->country }}"
                                            data-property-city="{{ $property->city }}"
                                            data-room-id="{{ $room->id }}"
                                            data-room-name="{{ $room->name }}"
                                            data-room-price="{{$room->price}}"

                                            >
                                            Choice

                                        </button>

                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
              </div>
        </section>

        <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed inset-0 top-0 bottom-0 left-0 right-0 z-50 flex items-center justify-center hidden w-full h-full overflow-x-auto overflow-y-auto">
            <div class="relative w-full h-auto max-w-2xl p-4">
                <!-- Modal content -->
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between pb-4 mb-2 border-b rounded-t sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Reservation
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form  id="reservation_form" >

                        <div class="mb-5">
                            <h4 id="property_name_display" class="text-xl font-semibold text-gray-900 dark:text-white"></h4>
                            <p class="mb-3">
                                <span id="property_address"></span>
                                <br>
                                <span id="property_city_display"></span>,
                                <span id="property_country_display"></span>
                            </p>
                            <h5  id="room_name_display" class="text-2xl font-semibold text-gray-900 dark:text-white"></h5>
                            <p id="room_price_display"></p>
                        </div>
                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                            <input type="text" name="room_id" id="room_id" class="hidden">
                            <input type="text" name="room_price" id="room_price" class="hidden">
                            <input type="text" name="room_name" id="room_name" class="hidden">
                            <input type="text" name="property_name" id="property_name" class="hidden">
                            <input type="text" name="property_country" id="property_country" class="hidden">
                            <input type="text" name="property_city" id="property_city" class="hidden">
                                <div>
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
                            <div>
                                <label for="check_out" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Check Out </label>
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
                        </div>
                        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Payment
                        </button>
                    </form>
                </div>
            </div>
        </div >
</x-layouts.app>

<script>
    $('#reservation_form').submit(function (event) {
        event.preventDefault();
        $('#defaultModal').addClass('hidden');
        $.ajax({
    url: '/reservation',
    type: 'POST',
    data: {
        _token: '{{ csrf_token() }}',
        property_name: $('input#property_name').val(),
        property_country: $('input#property_country').val(),
        property_city: $('input#property_city').val(),
        room_name: $('input#room_name').val(),
        room_id: $('input#room_id').val(),
        room_price: $('input#room_price').val(),
        check_in: $('input#check_in').val(),
        check_out: $('input#check_out').val()
    },
    success: function(result) {
        let orderId = result.order_id;
        snap.pay(result.snap_token, {
            onSuccess: function(result){
                $.post('/midtrans/update', {
                    _token: '{{ csrf_token() }}',
                    order_id: orderId,
                    transaction_status: 'success',
                }, function(response) {
                    console.log(JSON.stringify(response)); // Fixed the console.log statement
                    Swal.fire({
                        icon: 'success',
                        title: response.data,
                        text: 'Thank you! Your payment was successful.',
                    }).then(() => {
                        location.reload();
                    });
                });
            },
            onPending: function(result){
                $.post('/midtrans/update', {
                    _token: '{{ csrf_token() }}',
                    order_id: orderId,
                    transaction_status: 'pending',
                }, function(response) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Waiting for payment',
                        text: 'Please complete the payment.',
                    }).then(() => {
                        location.reload();
                    });
                });
            },
            onError: function(result){
                $.post('/midtrans/update', {
                    _token: '{{ csrf_token() }}',
                    order_id: orderId,
                    transaction_status: 'error',
                }, function(response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Payment Error',
                        text: 'Sorry for the inconvenience, please restart payment.',
                    }).then(() => {
                        location.reload();
                    });
                });
            },
            onClose: function(){
                Swal.fire({
                    icon: 'info',
                    title: 'Payment Closed',
                    text: 'You closed the payment popup. Please complete the payment later.',
                }).then(() => {
                    location.reload();
                });
            }
        });
    },
    error: function() {
        Swal.fire({
            icon: 'error',
            title: 'Failed to Start Payment',
            text: 'There was an error starting the payment. Please try again.',
        }).then(() => {
            location.reload();
        });
    }});


    });
</script>
