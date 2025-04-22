<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penalty extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'amount', 'date_issued', 'reason' , 'status'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
