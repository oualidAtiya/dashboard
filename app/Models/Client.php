<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_last_name',
        'contact_first_name',
        'phone',
        'email',
        'address',
        'importateur_id'
    ];

    public function bascules()
    {
        return $this->hasMany(Bascule::class);
    }
        public function importateur()
    {
        return $this->belongsTo(Importateur::class);
    }
}
