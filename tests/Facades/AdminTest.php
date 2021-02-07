<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

namespace CodeSinging\PinAdmin\Tests\Facades;

use CodeSinging\PinAdmin\Facades\Admin;
use CodeSinging\PinAdmin\Foundation\Admin as AdminClass;
use Orchestra\Testbench\TestCase;

class AdminTest extends TestCase
{
    public function testFacade()
    {
        self::assertEquals(AdminClass::NAME, Admin::name());
    }
}
