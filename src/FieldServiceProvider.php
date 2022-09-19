<?php

declare(strict_types=1);

namespace Ardenthq\EnhancedTextarea;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(static function (ServingNova $event) {
            Nova::script('enhanced-textarea', __DIR__.'/../dist/js/field.js');
        });
    }
}
