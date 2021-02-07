<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

namespace CodeSinging\PinAdmin\Console;

class Command extends \Illuminate\Console\Command
{
    use FileHelpers;

    /**
     * Output a lead message.
     * @param string $title
     * @param string $prefix
     */
    protected function title(string $title, string $prefix = '- ')
    {
        $this->line($prefix . $title);
    }
}