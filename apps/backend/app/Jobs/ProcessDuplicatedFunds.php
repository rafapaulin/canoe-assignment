<?php

namespace App\Jobs;

use App\Models\DuplicatedFund;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Queue\Queueable;

class ProcessDuplicatedFunds implements ShouldQueue
{
    use Queueable;

    /**
     * The funds to process.
     */
    protected Collection $funds;

    /**
     * Create a new job instance.
     */
    public function __construct(Collection $funds)
    {
        $this->funds = $funds;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $duplicatedFund = DuplicatedFund::create([
            'manager_id' => $this->funds->first()->manager_id,
        ]);

        $duplicatedFund->funds()->attach($this->funds->pluck('id'));
    }
}
