<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bascule extends Model
{
    protected $fillable = [
        'model', 'serial_number', 'characteristics', 'acquisition_date', 'client_id', 'importateur_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function importateur()
    {
        return $this->belongsTo(Importateur::class);
    }

    public function revisionsMetrologiques()
    {
        return $this->hasMany(RevisionMetrologique::class);
    }
}
