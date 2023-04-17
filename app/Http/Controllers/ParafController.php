<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParafRequest;
use App\Http\Requests\ParafUpdateRequest;
use App\Http\Resources\ParafUpdateResource;
use App\Imports\TransactionImport;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

class ParafController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):array
    {
        $transaction = Cache::get( 'Transaction' );
        $transactionsArray = $transaction->toArray();
        $countTransactions = $transaction->count();
        $limit = $request->limit ?? Transaction::PERPAGE;
        $page = ($request->offset + $limit) / $limit;
        $result = $this->paginate($transactionsArray, $limit, $page)->values();

        return [
            'total' => $limit,
            'recordsTotal' => $limit,
            'recordsFiltered' => $countTransactions,
            'data' => $result,
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ParafRequest $parafRequest):void
    {
        $import = new TransactionImport;
        Excel::import($import, $parafRequest->file('paraf_file')->store('temp'));
       
        Http::post('https://quiz.paraf.app/job/log.php', [
            'params' => json_encode([
                'message' => 'create paraf transactions',
                'datetime' => Carbon::now()->toDateTime(),
                'data' => [
                    'error' => count($import->getError())
                ]
            ])
        ]);
    }


    private function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $items = Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(Transaction $paraf)
    {
        return view('parafs.edit', ['paraf' => $paraf]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(ParafUpdateRequest $request, Transaction $paraf)
    {
        $paraf->update($request->all());

        Http::post('https://quiz.paraf.app/job/log.php', [
            'params' => json_encode([
                'message' => 'update paraf transaction',
                'datetime' => Carbon::now()->toDateTime(),
                'data' => [
                    'transaction' => $paraf->toArray()
                ]
            ])
        ]);

        return (new ParafUpdateResource($paraf));
    }
}
