<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

namespace CodeSinging\PinAdmin\Tests\Foundation;

use CodeSinging\PinAdmin\Foundation\Admin;
use CodeSinging\PinAdmin\Tests\PackageProviders;
use Orchestra\Testbench\TestCase;

class HelpersTest extends TestCase
{
    use PackageProviders;

    public function testAdmin()
    {
        self::assertInstanceOf(Admin::class, admin());
    }
}
