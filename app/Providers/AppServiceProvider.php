<?php

namespace App\Providers;

use App\Events\PostProcessed;
use App\Listeners\SendPostNotifaction;
use App\Models\Post;
use App\Policies\CommentPolicy;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use illuminate\Pagination\Paginator;

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
        Paginator::useBootstrapFour();

        Gate::policy(Post::class, PostPolicy::class, CommentPolicy::class);
        Event::listen(
            PostProcessed::class,
            SendPostNotifaction::class,
        );
    }
}
