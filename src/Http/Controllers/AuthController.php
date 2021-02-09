<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

namespace CodeSinging\PinAdmin\Http\Controllers;

class AuthController extends Controller
{
    public function index()
    {
        $this->setPageTitle('管理登录');
        return $this->adminView('auth.index');
    }
}