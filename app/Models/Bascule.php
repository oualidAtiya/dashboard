<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bascule extends Model
{
    use HasFactory;

    protected $fillable = [
        'model', 'serial_number', 'characteristics', 'acquisition_date', 'client_id'
    ];

    // A Bascule belongs to a Client
    public function client()
    {
        return $this->belongsTo(Client::class);  // This assumes you have 'client_id' in the bascules table
    }

    // A Bascule belongs to an Importateur
    public function importateur()
    {
        return $this->belongsTo(Importateur::class);  // This assumes you have 'importateur_id' in the bascules table
    }
}
