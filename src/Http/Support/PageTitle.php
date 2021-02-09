<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

namespace CodeSinging\PinAdmin\Http\Support;

use CodeSinging\PinAdmin\Facades\Admin;

trait PageTitle
{
    /**
     * @var string
     */
    protected $pageTitle;

    /**
     * Get page title.
     *
     * @param bool $withBaseName
     *
     * @return string
     */
    protected function pageTitle(bool $withBaseName = true): string
    {
        $baseName = Admin::config('name', Admin::name());
        if (empty($this->pageTitle)) {
            return $baseName;
        }

        return $this->pageTitle . ($withBaseName ? ' - ' . $baseName : '');
    }

    /**
     * Set page title.
     *
     * @param string $pageTitle
     *
     * @return $this
     */
    protected function setPageTitle(string $pageTitle): self
    {
        $this->pageTitle = $pageTitle;
        return $this;
    }
}