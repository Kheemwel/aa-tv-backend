<form class='card p-3 align-items-center' wire:submit='login()' style="width: 25rem;">
    <div class="mb-5 d-flex flex-column align-items-center">
        <img alt="" src="{{ asset('assets/AA TV Banner.png') }}" width="100px">
        <h3 class="mt-2 fw-bold">AA TV</h1>
    </div>
    <div class="d-flex flex-column w-100">
        <h5 class="align-self-center">Login</h5>
        <div class="input-group mb-3  flex-grow">
            <span class="input-group-text">Username</span>
            <input class="form-control  @error('username') is-invalid @enderror" type="text" wire:model='username'>
            <span class="invalid-feedback">
                @error('username')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="input-group mb-1">
            <span class="input-group-text">Password</span>
            <input class="form-control  @error('password') is-invalid @enderror" type="password" wire:model='password'>
            <span class="invalid-feedback">
                @error('password')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <span class='text-danger'>
            {{ $error_message }}
        </span>
    </div>

    <x-submit-button class="mt-5" target='login'>Login</x-submit-button>
</form>
