<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

namespace CodeSinging\PinAdmin\Tests\Console;

use CodeSinging\PinAdmin\Tests\Console\Support\RegisterCommand;
use CodeSinging\PinAdmin\Tests\Console\Support\TestTitleCommand;
use Orchestra\Testbench\TestCase;

class CommandTest extends TestCase
{
    use RegisterCommand;

    public function testTitle()
    {
        $this->registerCommand(TestTitleCommand::class);

        $artisan = $this->artisan('pin-test:title');
        $artisan->assertExitCode(0);
        $artisan->expectsOutput('- Test title');
    }
}
