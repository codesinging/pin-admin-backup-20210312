<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

namespace CodeSinging\PinAdmin\Tests\Console\Commands;

use CodeSinging\PinAdmin\Tests\PackageProviders;
use Orchestra\Testbench\TestCase;

class InstallCommandTest extends TestCase
{
    use PackageProviders;

    protected function defineEnvironment($app)
    {
        $app['config']->set('database.default', 'testing');
    }

    protected function defineDatabaseMigrations()
    {
        $this->artisan('migrate', ['--database' => 'testing']);
    }

    public function testInstall()
    {
        $this->artisan('admin:install')->run();

        self::assertFileExists(config_path('admin.php'));
        self::assertFileExists(base_path('routes/admin.php'));
        self::assertDirectoryExists(public_path('static/vendor/admin'));
    }
}
