<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bascule extends Model
{
    use HasFactory;

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
