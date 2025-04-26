<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Penalty;
use App\Models\RevisionMetrologique;
use Carbon\Carbon;

class GeneratePenalties extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-penalties';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $revisions = RevisionMetrologique::with('bascules.client')
            ->where('status' ,'!=' , 'complete')
            ->whereDate('last_revision_date', '<=', now()->subYear())
            ->get();
    
        foreach ($revisions as $revision) {
            if (!$revision->bascules || !$revision->bascules->client_id) {
                continue;
            }
    
            $dateEcheance = Carbon::parse($revision->last_revision_date)->addYear();
    
            if ($dateEcheance->isPast()) {
                // Calculate overdue months and penalty amount
                $overdueMonths = $dateEcheance->diffInMonths(now());
                $penaltyAmount = $overdueMonths * 100;
    
                // Check if penalty already exists
                $exists = Penalty::where('revision_id', $revision->id)->exists();
                if (!$exists) {
                    Penalty::create([
                        'client_id' => $revision->bascules->client_id,
                        'amount' => $penaltyAmount, // Updated penalty amount
                        'date_issued' => now(),
                        'overdue_months' => $overdueMonths , 
                        'status' => 'en attente',
                        'revision_id' => $revision->id,
                    ]);
                    $this->info("Pénalité générée pour la révision {$revision->id}, montant: {$penaltyAmount} DH.");
                }
            }
        }
    }
    
}
// i have a problem that not all penalties added and also revision data set as null value even if i did static value