<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;

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
        // Share categories với tất cả views
        view()->composer('*', function ($view) {
            $view->with('headerCategories', \App\Models\Category::where('is_active', true)
                ->orderBy('sort_order')
                ->get());
        });

        // Custom rate limiter cho contact form
        RateLimiter::for('contact', function ($request) {
            return Limit::perMinutes(10, 3)
                ->by($request->ip())
                ->response(function ($request, array $headers) {
                    return redirect()
                        ->route('contact')
                        ->with('error', 'Bạn đã gửi quá nhiều tin nhắn. Vui lòng thử lại sau 10 phút.')
                        ->withInput();
                });
        });
    }
}
