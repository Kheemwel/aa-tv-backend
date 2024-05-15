<aside class="col-2 bg-dark bg-gradient overflow-auto p-3 shadow-lg">
    <div class="d-flex flex-column justify-content-center align-items-center mb-3">
        <img alt="" src="{{ asset('assets/AA TV Banner.png') }}" width="100px">
        <h3 class="mt-2 fw-bold text-white">AA TV</h1>
    </div>

    <ul class="nav nav-pills navbar-expand-lg flex-column">
        <x-nav-link url='games'><i class="bi bi-controller"></i> Games</x-nav-link>
        <x-nav-link url='announcements'><i class="bi bi-megaphone-fill"></i> Announcements</x-nav-link>
        <x-nav-link url='events'><i class="bi bi-calendar-event-fill"></i> Events</x-nav-link>
        <x-nav-link url='videos'><i class="bi bi-file-earmark-play-fill"></i> Videos</x-nav-link>
        <x-nav-link url='video-categories'><i class="bi bi-bookmarks-fill"></i> Video Categories</x-nav-link>
        <x-nav-link><i class="bi bi-bell-fill"></i> Notifications</x-nav-link>
    </ul>
</aside>
