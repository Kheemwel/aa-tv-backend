<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    {{-- This will allow bootstrap to be loaded in ngrok --}}
    <meta content="upgrade-insecure-requests" http-equiv="Content-Security-Policy">

    <title>{{ $title ?? 'Page Title' }}</title>


    @livewireStyles()
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="d-flex vh-100">
        @include('components.layouts.sidebar')
        {{ $slot }}
    </div>

    @livewireScripts()
    <script>
        Livewire.on('closeModals', () => {
            const $modals = document.querySelectorAll('.modal')
            $modals.forEach(modal => {
                let currentModal = bootstrap.Modal.getInstance(modal)
                if (currentModal) currentModal.hide()
            })
        });
    </script>
</body>

</html>
