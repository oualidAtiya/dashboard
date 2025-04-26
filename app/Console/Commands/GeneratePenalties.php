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
        ->where('status', '!=', 'completed')
        ->get();

        foreach ($revisions as $revision) {
            // if (!$revision->bascules || !$revision->bascules->client_id) {
            //     continue;
            // }
            $dateEcheance = Carbon::parse($revision->last_revision_date)->addYear();
    
            if ($dateEcheance->isPast()) {
                // Check if penalty already exists
                $exists = Penalty::where('revision_id', $revision->id)->exists();
                if (!$exists) {
                    Penalty::create([
                        'revision_id' => $revision->id,
                        'client_id' => $revision->bascules->client_id,
                        'amount' => 99,
                        'date_issued' => now(),
                        'status' => 'en attente',
                    ]);
                }
                $this->info('Pénalités générées avec succès.' . $revision->id);
            }
        }
    
    }
}
// i have a problem that not all penalties added and also revision data set as null value even if i did static value