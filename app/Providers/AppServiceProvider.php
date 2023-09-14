<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Http\ViewComposers\TopbarComposer;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('admin.layouts.includes.overall.topbar', TopbarComposer::class);

        Validator::extend('not_zip', function ($attribute, $value, $parameters, $validator) {
            $mimeType = $value->getClientMimeType();
            return $mimeType !== 'application/zip';
        });
    }
}
