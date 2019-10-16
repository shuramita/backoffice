<?php
namespace Shura\BackOffice;

use Shura\BackOffice\ViewComposers\Navigator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public $namespace = 'BackOffice';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */

    public function boot()
    {
        View::composer(
            $this->namespace.'::sections.navigation', function($view){
                    $view->with('items', app('BackOfficeNavigator')->items);
            }
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('BackOfficeNavigator', function($app)
        {
            return new Navigator();
        });

    }

}
