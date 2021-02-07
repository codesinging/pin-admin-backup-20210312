<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

namespace CodeSinging\PinAdmin\Facades;

use CodeSinging\PinAdmin\Foundation\Admin as AdminClass;
use Illuminate\Support\Facades\Facade;

/**
 * Class Admin
 * @package CodeSinging\PinAdmin\Facades
 *
 * @method static string version()
 * @method static string brand()
 * @method static string slogan()
 * @method static string name()
 * @method static string guard()
 * @method static string directory(string $path = '')
 * @method static string path(string $path = '')
 * @method static string getNamespace(string $path = '')
 * @method static string pagePath(string $path = '')
 * @method static AdminClass app()
 */
class Admin extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return AdminClass::class;
    }
}