<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Penalty;
use Illuminate\Http\Request;

class PenalityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all penalties and include client details
        $penaltyTotal = Penalty::sum('amount');
        $clientsInDelay = Client::whereHas('penalties', function ($query) {
            $query->where('status', 'Non Payé');  // You can also filter by 'Unpaid' status
        })->count();
        $clientsCount = Penalty::count();
        $penalities = Penalty::with('client')
        ->paginate(10)
        ->map(function ($penalty) {
            $days = now()->diffInDays($penalty->date_issued, false); // allow negative
                if ($days > 0) {
                $monthsDelayed = ceil($days / 30); // round up to next month
                $penalty->calculated_amount = $monthsDelayed * 100;
            } else {
                $penalty->calculated_amount = 0;
            }
    
            $penalty->days_delayed = $days;
            $penalty->days_delayed = (int) $penalty->days_delayed; 
            return $penalty;
        });
    
    return view('penalities.index', compact('penalities','penaltyTotal','clientsInDelay','clientsCount'));
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
