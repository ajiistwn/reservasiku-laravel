<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }} " class=" scroll-smooth">
    <head>
        <meta charset="utf-8" />

        <meta name="application-name" content="{{ config('app.name') }}" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="Icon" href="/logo-horizontal.png" type="image/png" />

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
        @vite('resources/js/app.js')
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    </body>
</html>
