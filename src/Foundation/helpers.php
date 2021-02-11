<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

use CodeSinging\PinAdmin\Foundation\Admin;
use Illuminate\Support\HtmlString;

if (!function_exists('admin')) {
    /**
     * Get the Admin instance.
     */
    function admin(): Admin
    {
        return Admin::app();
    }
}

if (!function_exists('admin_asset')) {
    /**
     * Get the assets path of the PinAdmin application.
     *
     * @param string $path
     *
     * @return string
     */
    function admin_asset(string $path = ''): string
    {
        return Admin::app()->asset($path);
    }
}

if (!function_exists('admin_mix')) {
    /**
     * Get the path to a versioned Mix file of the PinAdmin application.
     *
     * @param string $path
     *
     * @return HtmlString|string
     * @throws Exception
     */
    function admin_mix(string $path)
    {
        return Admin::app()->mix($path);
    }
}

if (!function_exists('admin_template')) {
    /**
     * Get the view template of the PinAdmin application.
     * @param string $path
     * @return string
     */
    function admin_template(string $path): string
    {
        return Admin::app()->template($path);
    }
}