<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ConsolidateDailyAccounting implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $targetDate;

    /**
     * Create a new job instance.
     * Allow optionally passing a date to run historically.
     */
    public function __construct($date = null)
    {
        $this->targetDate = $date ? Carbon::parse($date)->toDateString() : Carbon::yesterday()->toDateString();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Supongamos que la tabla de movimientos contables maestras sea 'accounting_entries' o la leemos
        // de un log maestro. Si el sistema usa una abstraccion, adaptaremos a la tabla real.
        // Pero establecemos el patrón de consolidación aquí.

        // Por seguridad en este boilerplate, enlazamos el intent a DB de movimientos
        /*
        $summaries = DB::table('accounting_entries')
            ->select('account_id', DB::raw('SUM(debit) as total_debit'), DB::raw('SUM(credit) as total_credit'))
            ->whereDate('created_at', $this->targetDate)
            ->groupBy('account_id')
            ->get();

        foreach ($summaries as $summary) {
            DB::table('accounting_daily_summaries')->updateOrInsert(
                ['date' => $this->targetDate, 'account_id' => $summary->account_id],
                [
                    'debit_total' => DB::raw("debit_total + {$summary->total_debit}"),
                    'credit_total' => DB::raw("credit_total + {$summary->total_credit}"),
                    'updated_at' => now(),
                    // Si inserta nuevo
                    'created_at' => now()
                ]
            );
        }
        */
    }
}
