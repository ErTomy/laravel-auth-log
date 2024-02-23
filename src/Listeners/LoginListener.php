<?php

namespace Ertomy\Authlog\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;

use Ertomy\Authlog\Models\Log;

class LoginListener
{
    public Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle($event): void
    {
        $listener = Login::class;
        if (! $event instanceof $listener) {
            return;
        }

        if ($event->user) {
            Log::create([
                'user_id' => $event->user->id,
                'login_at' => now(),
                'login_successful' => true,
                'ip_address' => $this->request->ip(),
                'user_agent' => $this->request->userAgent()
            ]);          
        }
    }
}
