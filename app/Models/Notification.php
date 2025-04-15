<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'client_id', 'title', 'message', 'type', 'status'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
