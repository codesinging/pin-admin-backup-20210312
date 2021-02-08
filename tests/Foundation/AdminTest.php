<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

namespace CodeSinging\PinAdmin\Tests\Foundation;

use CodeSinging\PinAdmin\Foundation\Admin;
use CodeSinging\PinAdmin\Tests\PackageProviders;
use Illuminate\Support\Facades\File;
use Orchestra\Testbench\TestCase;

class AdminTest extends TestCase
{
    use PackageProviders;

    /**
     * @var Admin
     */
    protected $admin;

    protected function defineEnvironment($app)
    {
        $app['config']->set('database.default', 'testing');
    }

    protected function defineDatabaseMigrations()
    {
        $this->artisan('migrate', ['--database' => 'testing']);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = Admin::app();
        self::artisan('admin:install');
    }

    public function testVersion()
    {
        self::assertEquals(Admin::VERSION, $this->admin->version());
    }

    public function testBrand()
    {
        self::assertEquals(Admin::BRAND, $this->admin->brand());
    }

    public function testSlogan()
    {
        self::assertEquals(Admin::SLOGAN, $this->admin->slogan());
    }

    public function testName()
    {
        self::assertEquals(Admin::NAME, $this->admin->name());
    }

    public function testGuard()
    {
        self::assertEquals(Admin::GUARD, $this->admin->guard());
    }

    public function testDirectory()
    {
        self::assertEquals(Admin::DIRECTORY, $this->admin->directory());
        self::assertEquals(Admin::DIRECTORY . DIRECTORY_SEPARATOR . 'Controllers', $this->admin->directory('Controllers'));
    }

    public function testPath()
    {
        self::assertEquals(app_path(Admin::DIRECTORY), $this->admin->path());
        self::assertEquals(app_path(Admin::DIRECTORY) . DIRECTORY_SEPARATOR . 'Controllers', $this->admin->path('Controllers'));
    }

    public function testGetNamespace()
    {
        self::assertEquals($this->app->getNamespace() . Admin::DIRECTORY, $this->admin->getNamespace());
        self::assertEquals($this->app->getNamespace() . Admin::DIRECTORY . '\\Controllers', $this->admin->getNamespace('Controllers'));
    }

    public function testPackagePath()
    {
        self::assertEquals(dirname(dirname(__DIR__)), $this->admin->packagePath());
        self::assertEquals(dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'src', $this->admin->packagePath('src'));
    }

    public function testApp()
    {
        self::assertEquals(app($this->admin->name()), Admin::app());
    }

    public function testConfig()
    {
        self::assertEquals(config('admin'), $this->admin->config());

        $this->admin->config(['author' => 'codesinging']);
        self::assertEquals('codesinging', config('admin.author'));
        self::assertEquals('codesinging', $this->admin->config('author'));
    }

    public function testRoutePrefix()
    {
        self::assertEquals('admin', $this->admin->routePrefix());
    }

    public function testRoute()
    {
        self::assertEquals(route('admin.auth'), $this->admin->route('auth'));
    }

    public function testUrl()
    {
        self::assertEquals(url('admin'), $this->admin->url());
        self::assertEquals(url('admin/auth'), $this->admin->url('auth'));
    }

    public function testLink()
    {
        self::assertEquals('/admin', $this->admin->link());
        self::assertEquals('/admin/auth', $this->admin->link('auth'));
    }

    public function testHome()
    {
        self::assertEquals('/admin', $this->admin->home());
    }

    public function testAsset()
    {
        self::assertEquals('https://pinfankeji.com/app.js', $this->admin->asset('https://pinfankeji.com/app.js'));
        self::assertEquals('http://pinfankeji.com/app.js', $this->admin->asset('http://pinfankeji.com/app.js'));
        self::assertEquals('//pinfankeji.com/app.js', $this->admin->asset('//pinfankeji.com/app.js'));
        self::assertEquals('/app.js', $this->admin->asset('/app.js'));
        self::assertEquals('/static/vendor/admin/', $this->admin->asset());
        self::assertEquals('/static/vendor/admin/app.js', $this->admin->asset('app.js'));
    }

    public function testMix()
    {
        if (!is_file(public_path('static/vendor/admin/mix-manifest.json'))){
            File::copy(__DIR__.'/stubs/mix-manifest.json', public_path('static/vendor/admin/mix-manifest.json'));
        }
        self::assertEquals('/static/vendor/admin/app.js?id=4831febc8b23f65b7864', $this->admin->mix('app.js'));
        File::delete(public_path('static/vendor/admin/mix-manifest.json'));
    }

    public function testTemplate()
    {
        self::assertEquals('admin::index.index', $this->admin->template('index.index'));
    }

    public function testView()
    {
        self::assertEquals(view('admin::index.index'), $this->admin->view('index.index'));
    }

    public function testAuth()
    {
        self::assertEquals(auth($this->admin->guard()), $this->admin->auth());
    }

    public function testUser()
    {
        self::assertEquals(auth($this->admin->guard())->user(), $this->admin->user());
    }
}
