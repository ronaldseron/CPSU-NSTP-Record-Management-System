<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'CPSU NSTP SYSTEM') }}</title>

        <!-- Meta Tags-->
        <meta name="description" content="CPSU National Service Training Program Management System">
        <meta property="og:title" content="CPSU NSTP">
        <meta property="og:description" content="Central Philippines State University NSTP System">
        <meta property="og:image" content="{{ asset('Images/cpsu.png') }}">

        <!-- Favicon -->
        <link rel="icon" href="{{ Vite::asset('resources/images/cpsu.png') }}" type="image/x-icon">
        <!-- For Apple devices -->
        <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        {{-- Boxicons --}}
        <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
