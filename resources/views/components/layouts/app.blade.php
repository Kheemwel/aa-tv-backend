<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $title ?? 'Page Title' }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script type="module" src="https://cdn.jsdelivr.net/npm/ldrs/dist/auto/dotSpinner.js"></script>
    @livewireStyles()
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
        Livewire.on('resetFileInputs', () => {
            let fileInputs = document.querySelectorAll('input[type="file"]');
            fileInputs.forEach(function(input) {
                input.value = '';
            });
        });
    </script>
</body>

</html>
