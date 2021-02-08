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
use CodeSinging\PinAdmin\Http\Middleware\Authenticate;
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
        'admin.auth' => Authenticate::class,
    ];

    /**
     * Register PinAdmin services.
     */
    public function register()
    {
        $this->registerBinding();
        $this->registerCommands();
        $this->registerMiddleware();
        $this->publishResources();
    }

    /**
     * Bootstrap PinAdmin services.
     */
    public function boot()
    {
        $this->loadRoutes();
        $this->loadViews();
        $this->loadMigrations();
        $this->configureAuth();
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
        if ($this->app->runningInConsole()){
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

    /**
     * Load PinAdmin application routes.
     */
    protected function loadRoutes(): void
    {
        $this->loadRoutesFrom(AdminFacade::packagePath('routes/web.php'));

        if (is_file($route = app()->basePath('routes/admin.php'))) {
            $this->loadRoutesFrom($route);
        }
    }

    /**
     * Load views of PinAdmin.
     */
    protected function loadViews(): void
    {
        $this->loadViewsFrom(AdminFacade::packagePath('resources/views'), AdminFacade::name());
    }

    /**
     * Load database migrations.
     */
    protected function loadMigrations(): void
    {
        $this->loadMigrationsFrom(AdminFacade::packagePath('database/migrations'));
    }

    /**
     * Configure authentication guards and providers.
     */
    protected function configureAuth(): void
    {
        config([
            'auth.guards' => array_merge(config('auth.guards'), AdminFacade::config('guards', [])),
            'auth.providers' => array_merge(config('auth.providers'), AdminFacade::config('providers', [])),
        ]);
    }
}