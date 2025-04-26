@php
    function linkToId($id) {
        $path = request()->path();
        if ($path == '/' || $path == '' || request()->has('page')) {
            return "#$id";
        } else {
            return "/#$id";
        }
    }
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }} " class=" scroll-smooth">
    <head>
        <meta charset="utf-8" />

        <meta name="application-name" content="{{ config('app.name') }}" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="Icon" href="/logo-horizontal.png" type="image/png" />
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

        <title>{{ config('app.name') }}</title>

        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>

        @filamentStyles
        @vite('resources/css/app.css')
    </head>

    <body class="antialiased ">
        <x-layouts.header />
        {{ $slot }}
        <x-layouts.footer />

        @filamentScripts
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
        @vite('resources/js/app.js')

    </body>
</html>
