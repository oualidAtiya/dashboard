<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $fillable = [
        'contact_last_name', 'contact_first_name', 'phone', 'email', 'address', 'importateur_id'
    ];

    // A Client belongs to an Importateur
    public function importateur()
    {
        return $this->belongsTo(Importateur::class);  // This assumes 'importateur_id' is the foreign key
    }
    public function bascules()
    {
        return $this->hasMany(Bascule::class);
    }
    public function penalties()
    {
        return $this->hasMany(Penalty::class);
    }
}
