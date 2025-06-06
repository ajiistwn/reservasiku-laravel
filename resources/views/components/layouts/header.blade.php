<header class="fixed top-0 left-0 right-0 z-50 border-gray-200 dark:bg-gray-900 ">
    <nav class="border-gray-200 px-4 lg:px-6 py-2.5 ">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl mx-auto">
            <a href="/" class="flex items-center overflow-hidden">
                <img id="logo"  src="{{ asset('logo-horizontal-white.png') }}" class="w-auto h-20 sm:h-20" alt="Logo" />
            </a>
            <div class="flex items-center lg:order-2">

                @if (Auth::check())
                    <a  href="/profile" class="group flex flex-row justify-items-center  items-center gap-2  dark:text-white  hover:text-cyan-500  font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        <img class="w-8 border-2 border-transparent rounded-full group-hover:border-cyan-500" src="{{ asset('storage/'.Auth::user()->image) }}" alt="i{{ Auth::user()->name }}" />
                        <p id="user-info" class="text-white group-hover:text-cyan-500">
                            {{ Auth::user()->name }}
                        </p>
                    </a>
                @else
                    <a id="login-button" href="/auth/login" class="text-white dark:text-white  hover:text-cyan-500   font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 ">Log in</a>
                @endif


                <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-white rounded-lg btn-menu lg:hidden hover:bg-white/50 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href="{{ linkToId('home') }}" class="block py-2 pl-3 pr-4 text-white border-b border-gray-100 nav-link text-bold hover:text-cyan-500 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark: lg:dark:hover:text-cyan-500 dark:hover:bg-gray-700 dark:hover:text-cyan-500 lg:dark:hover:bg-transparent dark:border-gray-700">Home</a>
                    </li>
                    <li>
                        <a href="{{ linkToId('explore') }}" class="block py-2 pl-3 pr-4 text-white border-b border-gray-100 nav-link hover:text-cyan-500 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark: lg:dark:hover:text-cyan-500 dark:hover:bg-gray-700 dark:hover:text-cyan-500 lg:dark:hover:bg-transparent dark:border-gray-700">Explore</a>
                    </li>
                    <li>
                        <a href="{{ linkToId('about') }}" class="block py-2 pl-3 pr-4 text-white border-b border-gray-100 nav-link hover:text-cyan-500 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark: lg:dark:hover:text-cyan-500 dark:hover:bg-gray-700 dark:hover:text-cyan-500 lg:dark:hover:bg-transparent dark:border-gray-700">About Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<script>
    $(document).ready(function () {
        let $headerButton = $('#login-button, #user-info');
        let $logo = $('#logo');

        // Cek apakah path URL adalah angka, misalnya /1, /23, /99
        const isDetailPage = /^\/\d+$/.test(window.location.pathname);

        function updateHeader(scroll) {
            if (scroll > 0 || isDetailPage) {
                $headerButton.removeClass('text-white').addClass('text-black');
                $logo.attr('src', '/logo-horizontal.png');
            } else {
                $headerButton.removeClass('text-black').addClass('text-white');
                $logo.attr('src', '/logo-horizontal-white.png');
            }
        }

        // Jalankan saat halaman pertama kali dibuka
        updateHeader($(window).scrollTop());

        // Jalankan saat user scroll
        $(window).on('scroll', function () {
            updateHeader($(window).scrollTop());
        });
    });
    // $(window).on('scroll', function() {
    //     let scroll = $(window).scrollTop();
    //     let $headerButton = $('#login-button, #user-info'); // gabung selector
    //     let $logo = $('#logo');

    //     if (scroll > 0) {
    //         $headerButton.removeClass('text-white').addClass('text-black');
    //         $logo.attr('src', '/logo-horizontal.png');
    //     } else {
    //         $headerButton.removeClass('text-black').addClass('text-white');
    //         $logo.attr('src', '/logo-horizontal-white.png');
    //     }
    // });
</script>
