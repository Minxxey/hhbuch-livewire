<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
</head>
<body class="bg-background">
<x-header/>

{{ $slot }}
@livewireScripts
</body>
</html>
