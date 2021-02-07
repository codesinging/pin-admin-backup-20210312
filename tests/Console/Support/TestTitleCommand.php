<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

namespace CodeSinging\PinAdmin\Tests\Console\Support;

use CodeSinging\PinAdmin\Console\Command;

class TestTitleCommand extends Command
{
    protected $signature = 'pin-test:title';

    public function handle()
    {
        $this->title('Test title');
    }
}