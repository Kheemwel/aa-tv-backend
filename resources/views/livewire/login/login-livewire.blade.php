<form class='card p-3 align-items-center' wire:submit='login()' style="width: 25rem;">
    <div style="z-index: 999" id='login-indicator' class="card h-100 w-100 position-absolute top-0 d-flex flex-column justify-content-center align-items-center d-none">
        <div class="spinner-border" role="status" style="height: 5rem; width: 5rem;">
            <span class="visually-hidden">Loading...</span>
          </div>
          <h3>Logging in...</h3>
    </div>

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
