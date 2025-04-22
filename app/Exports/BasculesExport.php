<?php

namespace App\Exports;

use App\Models\Bascule;
use Maatwebsite\Excel\Concerns\FromCollection;

class BasculesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Bascule::all();

    }
}
