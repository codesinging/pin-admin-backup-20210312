<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

namespace CodeSinging\PinAdmin\Tests\Foundation;

use CodeSinging\PinAdmin\Foundation\Admin;
use CodeSinging\PinAdmin\Foundation\AdminServiceProvider;
use Orchestra\Testbench\TestCase;

class AdminTest extends TestCase
{
    /**
     * @var Admin
     */
    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = Admin::app();
    }

    protected function getPackageProviders($app): array
    {
        return [AdminServiceProvider::class];
    }
}
