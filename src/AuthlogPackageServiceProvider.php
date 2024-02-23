<?php

namespace Ertomy\Authlog;

use Illuminate\Auth\Events\Failed;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;

use Illuminate\Contracts\Events\Dispatcher;

use Ertomy\Authlog\Listeners\FailedLoginListener;
use Ertomy\Authlog\Listeners\LoginListener;
use Ertomy\Authlog\Listeners\LogoutListener;

use Illuminate\Support\ServiceProvider;

class AuthlogPackageServiceProvider extends ServiceProvider
{

    public function boot()
    {
        // migraciones
        $this->loadMigrationsFrom(__DIR__.'/migrations');
      
        // comando añadir rol
        
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Ertomy\Authlog\Console\Commands\PurgeLog::class,         
            ]);
        }
        

        $events = $this->app->make(Dispatcher::class);
        $events->listen(Login::class, LoginListener::class);
        $events->listen(Failed::class, FailedLoginListener::class);
        $events->listen(Logout::class, LogoutListener::class);
        
    }

}

