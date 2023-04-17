<?php

namespace App\Imports;

use App\Models\Transaction;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Events\BeforeImport;

class TransactionImport implements ToModel
{
    use Importable, SkipsFailures;

    const A = 'نماد';
    const B = 'نام';
    const C = 'تعداد';
    const D = 'حجم';
    const E = 'ارزش';
    const F = 'دیروز';
    const G = 'اولین';
    const H = 'آخرین معامله - مقدار';
    const I = 'آخرین معامله - تغییر';
    const J = 'آخرین معامله - درصد';
    const K = 'قیمت پایانی - مقدار';
    const L = 'قیمت پایانی - تغییر';
    const M = 'قیمت پایانی - درصد';
    const N = 'کمترین';
    const O = 'بیشترین';
    const P = 'تاریخ';

    private $errors = []; // array to accumulate errors


    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model($row)
    {
        $validator = Validator::make($row, $this->rules(), $this->validationMessages());
        if ($validator->fails() | $this->isTableHaed($row)){
            $this->errors[] = $validator->errors()->messages() ?? 'table head';
            return;
        }

        return new Transaction([
            'name' => $row[0],
            'company' => $row[1],
            'quantity' => $row[2],
            'volume' => $row[3],
            'value' => $row[4],
            'yesterday' => $row[5],
            'first' => $row[6],
            'last_transaction_amount' => $row[7],
            'the_last_deal_change' => $row[8],
            'last_transaction_percentage' => $row[9],
            'final_price_quantity' => $row[10],
            'final_price_change' => $row[11],
            'final_price_percent' => $row[12],
            'the_least' => $row[13],
            'the_most' => $row[14],
            'date' => $row[15],
        ]);
    }


    public function rules(): array
    {
        return [
            '0' => 'required',
            '1' => 'required',
            '2' => 'required',
            '3' => 'required',
            '4' => 'required',
            '5' => 'required',
            '6' => 'required',
            '7' => 'required',
            '8' => 'required',
            '9' => 'required',
            '10' => 'required',
            '11' => 'required',
            '12' => 'required',
            '13' => 'required',
            '14' => 'required',
            '15' => 'required',
        ];
    }

    public function validationMessages()
    {
        return [
            '0.required' => trans('A.name_is_required'),
            '1.required' => trans('B.company_is_required'),
            '2.required' => trans('C.quantity_is_required'),
            '3.required' => trans('D.volume_is_required'),
            '4.required' => trans('E.value_is_required'),
            '5.required' => trans('F.yesterday_is_required'),
            '6.required' => trans('G.first_is_required'),
            '7.required' => trans('H.last_transaction_amount_is_required'),
            '8.required' => trans('I.the_last_deal_change_is_required'),
            '9.required' => trans('J.last_transaction_percentage_is_required'),
            '10.required' => trans('K.the_last_deal_change_is_required'),
            '11.required' => trans('L.final_price_change_is_required'),
            '12.required' => trans('M.final_price_percent_is_required'),
            '13.required' => trans('N.the_least_is_required'),
            '14.required' => trans('O.the_most_is_required'),
            '15.required' => trans('P.date_is_required'),
        ];
    }

    public function getError()
    {

        return $this->errors;
    }




    public function registerEvents(): array
    {
        return [
            BeforeImport::class => function (BeforeImport $event) {
                $totalRows = $event->getReader()->getTotalRows();

                if (!empty($totalRows)) {
                    $this->totals = $totalRows['Worksheet'];
                }
            }
        ];
    }


    private function isTableHaed($row)
    {
        return 
        self::A == $row[0] && 
        self::B == $row[1] && 
        self::C == $row[2] && 
        self::D == $row[3] && 
        self::E == $row[4] && 
        self::F == $row[5] && 
        self::G == $row[6] && 
        self::H == $row[7] && 
        self::I == $row[8] && 
        self::J == $row[9] && 
        self::K == $row[10] && 
        self::L == $row[11] && 
        self::M == $row[12] && 
        self::N == $row[13] && 
        self::O == $row[14] && 
        self::P == $row[15] ;
    }
}
