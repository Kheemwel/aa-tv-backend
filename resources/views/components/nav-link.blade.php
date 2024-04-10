{{-- my custom component for dynamic state navigation link --}}

@props(['url' => ''])
<li class="nav-item">
    <a class="nav-link {{ request()->is($url) ? 'active' : '' }}" href="{{ $url }}">{{ $slot }}</a>
</li>