<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

namespace CodeSinging\PinAdmin\Tests\Console\Support;

use Illuminate\Console\Application;
use Illuminate\Console\Command;

trait RegisterCommand
{
    protected function registerCommand(string $command)
    {
        Application::starting(function (Application $artisan) use ($command){
            $artisan->add(app($command));
        });
    }
}