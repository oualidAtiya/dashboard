<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RevisionMetrologique extends Model
{
    use HasFactory;
    protected $fillable = [
        'scale_id', 'last_revision_date', 'status', 'verification_report', 'verification_responsible'
    ];

    public function bascules()
    {
        return $this->belongsTo(Bascule::class, 'scale_id');
    }
}
