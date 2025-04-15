<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penalty extends Model
{
    protected $fillable = ['client_id', 'amount', 'date_issued', 'reason'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
