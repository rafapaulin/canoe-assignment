<?php

namespace App\Observers;

use App\Jobs\ProcessDuplicatedFunds;
use App\Models\Fund;

class FundObserver
{
    public function created(Fund $fund): void
    {
        $funds = Fund::with(['aliases'])->where('manager_id', $fund->manager_id)
            ->where(function ($q) use ($fund) {
                $q->where('name', $fund->name)
                    ->orWhereHas('aliases', function ($q2) use ($fund) {
                        $q2->where('name', $fund->name);
                    });
            });

        if ($funds->count() > 1) {
            dispatch(new ProcessDuplicatedFunds($funds->get()));
        }
    }
}
