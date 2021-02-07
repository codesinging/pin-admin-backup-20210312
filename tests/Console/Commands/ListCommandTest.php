<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

namespace CodeSinging\PinAdmin\Tests\Console\Commands;

use CodeSinging\PinAdmin\Tests\PackageProviders;
use Orchestra\Testbench\TestCase;

class ListCommandTest extends TestCase
{
    use PackageProviders;

    public function testCommand()
    {
        $artisan = $this->artisan('admin:list');
        $artisan->assertExitCode(0);
    }
}
