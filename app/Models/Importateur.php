<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Importateur extends Model
{
    use HasFactory;

    protected $table = 'importateurs';

    protected $fillable = [
        'company_name', 'contact_last_name', 'contact_first_name', 'phone', 'email', 'address'
    ];

    // An Importateur can have many Bascules
    public function bascules()
    {
        return $this->hasMany(Bascule::class);
    }

    // An Importateur can have many Clients
    public function clients()
    {
        return $this->hasMany(Client::class);  // This assumes you have 'importateur_id' in the clients table
    }
}
