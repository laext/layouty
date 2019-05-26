<?php

namespace Laext\Layouty;

use Encore\Admin\Form;
use Encore\Admin\Admin;
use Illuminate\Support\ServiceProvider;

class LayoutyServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(LayoutyExtension $extension)
    {
        if (!LayoutyExtension::boot()) {
            return;
        }

        if ($views = $extension->views()) {
            
            $this->loadViewsFrom($views, 'laext-layouty');
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {

            $this->publishes(
                [$assets => public_path('vendor/laext/layouty')], 'laext-layouty'
            );
        }

        Admin::booting(function () {
            Form::extend('layouty', Layouty::class);
        });
    }
}