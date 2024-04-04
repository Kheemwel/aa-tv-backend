<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    {{-- This will allow bootstrap to be loaded in ngrok --}}
    <meta content="upgrade-insecure-requests" http-equiv="Content-Security-Policy">

    <title>{{ $title ?? 'Page Title' }}</title>


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="flex-column container-fluid">
        <div class="row">

            @include('components.layouts.sidebar')
            {{ $slot }}
        </div>
    </div>
</body>

</html>
