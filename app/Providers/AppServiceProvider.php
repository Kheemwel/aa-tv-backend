<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        if ($this->isLocalhost()) {
            // If the request is coming from localhost or vhost, use http
            URL::forceScheme('http');
        } else {
            // For all other cases like local tunnel, default to https
            URL::forceScheme('https');
            // To fix livewire file upload failed in localtunnel
            request()->server->set('HTTPS', request()->header('X-Forwarded-Proto', 'https') == 'https' ? 'on' : 'off');
        }
    }

    /**
     * Check if the request is coming from localhost.
     *
     * @return bool
     */
    protected function isLocalhost()
    {
        return in_array(Request::server('REMOTE_ADDR'), ['127.0.0.1']);
    }

    /**
     * Check if the request is being forwarded from a local tunnel.
     *
     * @return bool
     */
    protected function isLocalTunnel()
    {
        return Request::header('host') === 'android-tv.loca.lt';
    }
}
