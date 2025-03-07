@props(['title' => ''])

<x-layouts.guest.page :title="$title">
    {{ $slot }}
</x-layouts.guest.page>
