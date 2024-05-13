<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>AA TV | Login</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            background: rgb(33, 150, 243);
            background: linear-gradient(315deg, rgba(33, 150, 243, 1) 0%, rgba(76, 175, 80, 1) 100%);
        }
    </style>

    @livewireStyles
</head>

<body class="bg-primary vh-100 d-flex justify-content-center align-items-center">
    {{ $slot }}

    @livewireScripts

    <script>
        Livewire.on('loginSuccess', () => {
            $('#login-indicator').removeClass('d-none');
        });
    </script>
</body>

</html>
