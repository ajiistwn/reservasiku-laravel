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
                        <x-card-room :room="$room" :property="$property" />
                    @endforeach
                </div>
              </div>
        </section>

        <x-form-reservation :property="$property" />
</x-layouts.app>


<script>
    $('#reservation_form').submit(function (event) {
        $('#defaultModal').addClass('hidden');
        const isLoggedIn = @json(Auth::check());
        if (!isLoggedIn) {
            event.preventDefault();
            Swal.fire({
                icon: 'warning',
                title: 'Login Required',
                text: 'Please login to make a reservation.',
                showCancelButton: true,
                confirmButtonText: 'Login',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/auth/login';
                } else {
                    // User clicked cancel, do nothing
                    location.reload();
                }
            });
            return;
        }


        event.preventDefault();
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
    error: function(err) {
        console.log(err);
        Swal.fire({
            icon: 'error',
            title: 'Failed Payment',
            text: 'Please check your network connection, email or phone number correctly.',
        }).then(() => {
            location.reload();
        });
    }});


    });
</script>
