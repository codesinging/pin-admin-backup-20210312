<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

namespace CodeSinging\PinAdmin\Tests\Console\Support;

use CodeSinging\PinAdmin\Console\Command;

class TestDeleteFileCommand extends Command
{
    use DirectoryHelpers;

    const SIGNATURE = 'admin-test:delete-file';

    protected $signature = 'admin-test:delete-file';

    public function handle()
    {
        $this->deleteFile($this->distPath('stub.php'));
    }
}