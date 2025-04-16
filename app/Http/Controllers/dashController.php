<?php

namespace App\Http\Controllers;

use App\Models\Bascule;
use App\Models\Client;
use App\Models\Importateur;
use App\Models\RevisionMetrologique;
use Illuminate\Http\Request;

class dashController extends Controller
{
    public function index(){
        $importersNumber = Importateur::count();
        $clientNumber = Client::count();
        $basculesNumber = Bascule::count();
        $pendingCount = RevisionMetrologique::where('status', 'pending')->count();
        // Select specific columns from the RevisionMetrologique table
        $revisions = RevisionMetrologique::select('id', 'scale_id', 'last_revision_date', 'status')
            ->orderBy('id', 'desc') // Get the latest first
            ->paginate(10);

        // Add 12 months to the last_revision_date to calculate next_revision_date
        $revisions->each(function($revision) {
            $revision->next_revision_date = \Carbon\Carbon::parse($revision->last_revision_date)->addMonths(12)->format('Y-m-d');
        });
        return view('dashboard' , compact(['importersNumber' ,'clientNumber' , 'basculesNumber' , 'pendingCount' , 'revisions']));
    }
}
