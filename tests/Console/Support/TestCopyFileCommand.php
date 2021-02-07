<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

namespace CodeSinging\PinAdmin\Tests\Console\Support;

use CodeSinging\PinAdmin\Console\Command;

class TestCopyFileCommand extends Command
{
    use DirectoryHelpers;

    const SIGNATURE = 'admin-test:copy-file';

    protected $signature = 'admin-test:copy-file';

    public function handle()
    {
        $this->copyFile(
            $this->stubPath('stub.php'),
            $this->distPath('stub.php'),
            [
                '__CONTENT__' => 'content',
            ]
        );
    }
}