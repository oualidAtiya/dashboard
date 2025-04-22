<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bascule;
use App\Models\RevisionMetrologique;
class RevisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $basculesNumber = Bascule::count();
        $pendingCount = RevisionMetrologique::where('status', 'pending')->count();
        $completedCount = RevisionMetrologique::where('status', 'completed')->count();
        $lateCount = RevisionMetrologique::where('status', 'late')->count();
        // Select specific columns from the RevisionMetrologique table
        $revisions = RevisionMetrologique::paginate(10);

        // Add 12 months to the last_revision_date to calculate next_revision_date
        $revisions->each(function($revision) {
            $revision->next_revision_date = \Carbon\Carbon::parse($revision->last_revision_date)->addMonths(12)->format('Y-m-d');
        });
        return view('revisions.index',compact('basculesNumber','pendingCount' , 'completedCount' , 'lateCount' , 'revisions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
