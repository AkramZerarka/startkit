<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @hasSection('title')
        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

    <livewire:styles />

    <livewire:scripts />
    <wireui:scripts />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-aspekta antialiased bg-white text-slate-800">
    <x-notifications z-index="z-50" />
    <x-dialog z-index="z-50" blur="md" align="center" />
    <main>
        {{ $slot }}
    </main>
</body>

</html>
