<?php

namespace App\Exports;

use App\Models\Importateur;
use Maatwebsite\Excel\Concerns\FromCollection;

class ImportateursExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Importateur::all();
    }
}
