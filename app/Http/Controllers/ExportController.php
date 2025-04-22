<?php

namespace App\Http\Controllers;

use App\Exports\BasculesExport;
use App\Exports\ClientsExport;
use App\Exports\ImportateursExport;
use App\Exports\RevisionMetrologiquesExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
class ExportController extends Controller
{
    public function index(){
        return view('exportData');
    }
    public function clients()
    {
        return Excel::download(new ClientsExport, 'clients.xlsx');
    }
    public function importateurs()
    {
        return Excel::download(new ImportateursExport, 'importateurs.xlsx');
    }
    public function bascules()
    {
        return Excel::download(new BasculesExport, 'bascules.xlsx');
    }
    public function revisions()
    {
        return Excel::download(new RevisionMetrologiquesExport, 'revisions.xlsx');
    }
}
