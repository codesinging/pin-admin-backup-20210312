<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

namespace CodeSinging\PinAdmin\Tests\Console\Support;

trait DirectoryHelpers
{
    protected function stubPath(string $path = ''): string
    {
        return dirname(__DIR__) . '/stubs' . ($path ? '/' . $path : '');
    }

    protected function distPath(string $path = ''): string
    {
        return dirname(__DIR__) . '/dist' . ($path ? '/' . $path : '');
    }
}