<?php

namespace Ertomy\Authlog\Listeners;

use Illuminate\Auth\Events\Failed;
use Illuminate\Http\Request;

use Ertomy\Authlog\Models\Log;

class FailedLoginListener
{
    public Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle($event): void
    {
        $listener = Failed::class;
        if (! $event instanceof $listener) {
            return;
        }

        if ($event->user) {
            Log::create([
                'user_id' => $event->user->id,
                'login_at' => now(),
                'login_successful' => false,
                'ip_address' => $this->request->ip(),
                'user_agent' => $this->request->userAgent()
            ]); 
        }
    }
}
