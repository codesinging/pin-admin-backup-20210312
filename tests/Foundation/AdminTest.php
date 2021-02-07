<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

namespace CodeSinging\PinAdmin\Tests\Foundation;

use CodeSinging\PinAdmin\Foundation\Admin;
use CodeSinging\PinAdmin\Tests\PackageProviders;
use Orchestra\Testbench\TestCase;

class AdminTest extends TestCase
{
    use PackageProviders;

    /**
     * @var Admin
     */
    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = Admin::app();
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
}
