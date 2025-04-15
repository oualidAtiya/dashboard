<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Importateur extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name', 'contact_last_name', 'contact_first_name', 'phone', 'email', 'address'
    ];

    public function bascules()
    {
        return $this->hasMany(Bascule::class);
    }
    public function client()
    {
        return $this->hasMany(Client::class);
    }
}

