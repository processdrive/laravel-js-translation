<?php

namespace ProcessDrive\LaravelJSTranslation;

use Illuminate\Support\ServiceProvider;
use Translate\Processdrivepackage\ConvertTransJsonCommand;


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