<?php

namespace Ertomy\Authlog\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'auth_log';
    public $timestamps = false;

    protected $fillable = [
        'ip_address', 'user_agent', 'login_at', 'login_successful', 'logout_at', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
