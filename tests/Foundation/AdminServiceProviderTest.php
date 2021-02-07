<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

namespace CodeSinging\PinAdmin\Tests\Foundation;

use CodeSinging\PinAdmin\Foundation\Admin;
use CodeSinging\PinAdmin\Tests\PackageProviders;
use Orchestra\Testbench\TestCase;

class AdminServiceProviderTest extends TestCase
{
    use PackageProviders;

    public function testRegisterBinding()
    {
        self::assertInstanceOf(Admin::class, app(Admin::NAME));
    }

    public function testSingleton()
    {
        self::assertSame(app(Admin::NAME), app(Admin::NAME));
    }

    public function testRegisterCommands()
    {
        $this->artisan('admin')->assertExitCode(0);
    }
}
