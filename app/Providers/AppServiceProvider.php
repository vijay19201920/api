<?php

namespace App\Providers;

use App\Post;
use Illuminate\Support\Carbon;
use Laravel\Passport\Passport;
use App\Observers\PostObserver;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Passport::routes();
        
        Post::observe(PostObserver::class);
        // Passport::tokensExpireIn(now()->addDays(1));
        // Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
