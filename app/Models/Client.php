<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'contact_last_name', 'contact_first_name', 'phone', 'email', 'address'
    ];

    public function bascules()
    {
        return $this->hasMany(Bascule::class);
    }
}
