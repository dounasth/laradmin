<?php namespace Bonweb\Laradmin;

use Illuminate\Support\ServiceProvider;

class LaradminServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('bonweb/laradmin');
        include __DIR__ . '/../../helpers/fn.commons.php';
        include __DIR__ . '/../../events.php';
        include __DIR__ . '/../../filters.php';
        include __DIR__ . '/../../routes.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        /*
         * Register the service provider for the dependency.
         */
        $this->app->register('Atticmedia\Anvard\AnvardServiceProvider');
        $this->app->register('Cartalyst\Sentry\SentryServiceProvider');
        $this->app->register('Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider');
        $this->app->register('Barryvdh\Debugbar\ServiceProvider');
        $this->app->register('Cviebrock\EloquentSluggable\SluggableServiceProvider');
        $this->app->register('Lanz\Commentable\CommentableServiceProvider');
        $this->app->register('Conner\Tagging\TaggingServiceProvider');
        $this->app->register('Mmanos\Metable\MetableServiceProvider');
        $this->app->register('yajra\Datatables\DatatablesServiceProvider');
        /*
         * Create aliases for the dependency.
         */
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Sentry', 'Cartalyst\Sentry\Facades\Laravel\Sentry');
        $loader->alias('Debugbar', 'Barryvdh\Debugbar\Facade');
        $loader->alias('Datatables', 'yajra\Datatables\Facades\Datatables');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

}
