@props(['form', 'target', 'disabledBy', 'class' => ''])
<button @isset($form)
form="{{ $form }}"
@endisset @isset($target)
wire:target='{{ $target }}'
@endisset @isset($disabledBy)
x-bind:disabled='{{ $disabledBy }}'
@endisset class="btn btn-primary w-50 d-flex justify-content-center {{ $class }}" type="submit" wire:loading.attr='disabled'>
    <div @isset($target)
    wire:target='{{ $target }}'
    @endisset class="spinner-border m-1 spinner-border-sm" role="status" wire:loading>
        <span class="visually-hidden">Loading...</span>
    </div>{{ $slot }}
</button>
