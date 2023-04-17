<?php

namespace App\Observers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Cache;

class ParafObserver
{

    /**
     * Handle the User "created" event.
     */
    public function created(Transaction $user): void
    {
        Cache::forget('Transaction');
        Cache::rememberForever('Transaction', function () {

            return  Transaction::all();
        });
    }


    /**
     * Handle the Transaction "updated" event.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return void
     */
    public function updated(Transaction $transaction)
    {
        Cache::forget('Transaction');
        Cache::rememberForever('Transaction', function () {

            return  Transaction::all();
        });
    }
}
