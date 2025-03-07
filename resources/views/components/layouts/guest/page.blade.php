@props(['title' => ''])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="antialiased  bg-slate-900 bg-gradient-to-b to-transparent from-indigo-600/20">
        {{ $slot }}
        @fluxScripts
    </body>
</html>
