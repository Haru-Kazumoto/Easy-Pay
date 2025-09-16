<?php

namespace App\Providers;

use App\Actions\Fortify\LoginResponse as CustomLoginResponse;
use App\Http\Requests\LoginRequest as CustomLoginRequest;;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Http\Requests\LoginRequest;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(LoginResponse::class, CustomLoginResponse::class);
        $this->app->singleton(LoginRequest::class, CustomLoginRequest::class);
    }   

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
