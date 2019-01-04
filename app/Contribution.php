<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contribution extends Model
{
    use Notifiable;

    protected $guarded = ['id'];

    public function routeNotificationForSlack() {
        return env('SLACK_WEBHOOK_URL');
    }
}
