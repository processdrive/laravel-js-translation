<?php

namespace ProcessDrive\LaravelJSTranslation;

use Illuminate\Support\ServiceProvider;
use ProcessDrive\LaravelJSTranslation\ConvertTransJsonCommand;


class TranslateServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__, 'Processdrivepackage');
        $this->commands([
            ConvertTransJsonCommand::class,
        ]);

    }
}
