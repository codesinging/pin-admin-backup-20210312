<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

namespace CodeSinging\PinAdmin\Http\Middleware;

use CodeSinging\PinAdmin\Facades\Admin;
use Illuminate\Http\Request;

class Authenticate extends \Illuminate\Auth\Middleware\Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     * @param Request $request
     * @return string|null
     */
    protected function redirectTo($request): ?string
    {
        if (!$request->expectsJson()) {
            return Admin::link('auth');
        }
    }
}