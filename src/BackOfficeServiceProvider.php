<?php
namespace Shura\BackOffice;

use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Core\Admin\ViewComposers\Item;
use Shura\BackOffice\Commands\Reset;
use Shura\BackOffice\Commands\Uninstall;
use Shura\BackOffice\Commands\Install;

class BackOfficeServiceProvider extends ServiceProvider
{
    public $namespace = 'BackOffice';


    /**
     * Bootstrap the application services.
     *
     * @return void
     */

    public function boot(Router $router)
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', $this->namespace);
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadTranslationsFrom(__DIR__.'/translations', $this->namespace);
        $this->loadJSONTranslationsFrom(__DIR__.'/translations');
        AliasLoader::getInstance()->alias('BackOfficeHelper', 'Shura\BackOffice\Helpers\Helper');
        $router->aliasMiddleware('backoffice', 'Shura\BackOffice\Middleware\BackOffice');
        $this->publishes([
            __DIR__.'/config/backoffice.php' => config_path('backoffice.php'),
        ]);
        if ($this->app->runningInConsole()) {
            $this->app->make(EloquentFactory::class)->load(__DIR__ . '/database/factories');
            $this->commands([
                Uninstall::class,
                Install::class,
                Reset::class
            ]);

        }
        $this->registerAdminNavigator();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/backoffice.php', 'backoffice');

    }
    public function registerAdminNavigator(){
            app('AdminNavigator')->registerNavigator(
                'backoffice', new Item('BackOffice Manager','backoffice',['admin'],'fa-newspaper')
            );

            /**
             * // example for register sub Nav
             * app('AdminNavigator')->registerSubNavigator(
             *    'backoffice', new Item('BackOffices','admin_list_backoffices','admin','fa-hotel')
             * );
             */

    }

}
