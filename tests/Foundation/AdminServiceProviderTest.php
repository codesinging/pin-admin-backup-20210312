<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

namespace CodeSinging\PinAdmin\Tests\Foundation;

use CodeSinging\PinAdmin\Foundation\Admin;
use CodeSinging\PinAdmin\Foundation\AdminServiceProvider;
use Orchestra\Testbench\TestCase;

class AdminServiceProviderTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [AdminServiceProvider::class];
    }

    public function testRegisterBinding()
    {
        self::assertInstanceOf(Admin::class, app(Admin::NAME));
    }

    public function testSingleton()
    {
        self::assertSame(app(Admin::NAME), app(Admin::NAME));
    }
}
