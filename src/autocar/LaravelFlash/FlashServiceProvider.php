<?php namespace autocar\LaravelFlash;

use Illuminate\Support\ServiceProvider;

class FlashServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'autocar\LaravelFlash\Contracts\SessionStore',
            'autocar\LaravelFlash\Sessions\LaravelSessionStore'
        );
        $app->singleton('flash', function ($this->app) {
			return new FlashNotifier();
		});
		
        /*$this->app->singleton('flash', function () {
            return $this->app->make('autocar\LaravelFlash\FlashNotifier');
        });*/
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'flash');

        $this->publishes([
            __DIR__.'/resources/views'  => base_path('resources/views/vendor/flash'),
            __DIR__.'/config/flash.php' => config_path('flash.php'),
        ]);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['flash'];
    }
}
