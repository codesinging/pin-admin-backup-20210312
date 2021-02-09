<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

namespace CodeSinging\PinAdmin\Http\Controllers;

use CodeSinging\PinAdmin\Http\Support\ControllerAction;
use CodeSinging\PinAdmin\Http\Support\JsonResponses;
use CodeSinging\PinAdmin\Http\Support\PageTitle;
use CodeSinging\PinAdmin\Http\Support\ViewResponses;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class Controller extends \Illuminate\Routing\Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    use ControllerAction, JsonResponses, ViewResponses, PageTitle;
}