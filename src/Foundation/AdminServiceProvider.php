<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

namespace CodeSinging\PinAdmin\Foundation;

use CodeSinging\PinAdmin\Console\Commands\AdminCommand;
use CodeSinging\PinAdmin\Console\Commands\InstallCommand;
use CodeSinging\PinAdmin\Console\Commands\ListCommand;
use CodeSinging\PinAdmin\Facades\Admin as AdminFacade;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * The console commands of PinAdmin.
     * @var array
     */
    protected $commands = [
        AdminCommand::class,
        ListCommand::class,
        InstallCommand::class,
    ];

    /**
     * The middlewares of PinAdmin.
     * @var array
     */
    protected $middlewares = [
    ];

    /**
     * Register PinAdmin services.
     */
    public function register()
    {
        $this->registerBinding();
        $this->registerCommands();
        $this->registerMiddleware();
    }

    /**
     * Bootstrap PinAdmin services.
     */
    public function boot()
    {
        $this->publishResources();
    }

    /**
     * Register the PinAdmin's binding to the container.
     */
    protected function registerBinding(): void
    {
        $this->app->singleton(Admin::NAME, Admin::class);
    }

    /**
     * Register PinAdmin's console commands.
     */
    protected function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands($this->commands);
        }
    }

    /**
     * Register middleware for the application routes.
     */
    protected function registerMiddleware(): void
    {
        /** @var Router $router */
        $router = $this->app['router'];

        foreach ($this->middlewares as $key => $middleware) {
            $router->aliasMiddleware($key, $middleware);
        }
    }

    /**
     * Publish resources.
     */
    protected function publishResources(): void
    {
        $this->publishes(
            [
                AdminFacade::packagePath('publishes/config') => config_path(),
                AdminFacade::packagePath('publishes/routes') => base_path('routes'),
                AdminFacade::packagePath('publishes/assets') => public_path('static/vendor/' . AdminFacade::name()),
                AdminFacade::packagePath('publishes/images') => public_path('static/vendor/' . AdminFacade::name() . '/images'),
            ],
            AdminFacade::name()
        );
    }
}