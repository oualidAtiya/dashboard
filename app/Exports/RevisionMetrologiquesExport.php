<?php

namespace App\Exports;

use App\Models\RevisionMetrologique;
use Maatwebsite\Excel\Concerns\FromCollection;

class RevisionMetrologiquesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RevisionMetrologique::all() ;
    }
}
