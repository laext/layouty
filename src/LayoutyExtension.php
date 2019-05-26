<?php

namespace Laext\Layouty;

use Encore\Admin\Extension;

class LayoutyExtension extends Extension
{
    public $name = 'layouty';

    public $views = __DIR__ . '/../resources/views';
    
    public $assets = __DIR__ . '/../resources/assets';
}