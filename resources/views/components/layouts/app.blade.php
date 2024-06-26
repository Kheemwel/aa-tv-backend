<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>AA TV | {{ $title }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @livewireStyles
</head>

<body>
    <div class="d-flex vh-100">
        {{-- Left navigation bar --}}
        @include('components.sidebar')


        <div class="col-10 overflow-auto">
            {{-- Top bar --}}
            @livewire('topbar-livewire')

            {{-- Main content --}}
            <div class="p-3">
                <div class="card p-1">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>

    @livewireScripts

    <script>
        // Close all modals
        Livewire.on('closeModals', () => {
            const $modals = document.querySelectorAll('.modal')
            $modals.forEach(modal => {
                let currentModal = bootstrap.Modal.getInstance(modal)
                if (currentModal) currentModal.hide()
            })
        });

        // Reset file inputs
        Livewire.on('resetFileInputs', () => {
            let fileInputs = document.querySelectorAll('input[type="file"]');
            fileInputs.forEach(function(input) {
                input.value = '';
            });
        });
    </script>

    @yield('scripts')
</body>

</html>
