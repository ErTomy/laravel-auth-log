<?php

namespace Ertomy\Authlog\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;

use Ertomy\Authlog\Models\Log;

class LogoutListener
{
    public Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle($event): void
    {
        $listener = Logout::class;
        if (! $event instanceof $listener) {
            return;
        }

        if ($event->user) {
            $log = Log::where('user_id', $event->user->id)->orderByDesc('login_at')->first();
            if($log && is_null($log->logout_at)){
                $log->logout_at = now();
                $log->save();
            }
        }
    }
}
