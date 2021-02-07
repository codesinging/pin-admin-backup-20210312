<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

namespace CodeSinging\PinAdmin\Tests\Console\Support;

use CodeSinging\PinAdmin\Console\Command;

class TestMakeDirectoryCommand extends Command
{
    use DirectoryHelpers;

    const SIGNATURE = 'admin-test:make-directory';

    protected $signature = 'admin-test:make-directory';

    public function handle()
    {
        $this->makeDirectory($this->distPath());
    }
}