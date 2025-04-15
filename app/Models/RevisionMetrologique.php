<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RevisionMetrologique extends Model
{
    protected $fillable = [
        'scale_id', 'last_revision_date', 'status', 'verification_report', 'verification_responsible'
    ];

    public function bascule()
    {
        return $this->belongsTo(Bascule::class);
    }
}
