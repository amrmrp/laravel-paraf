<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParafUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|string',
            'company'=>'required|string',
            'quantity'=>'required|string',
            'volume'=>'required|string',
            'value'=>'required|string',
            'yesterday'=>'required|string',
            'first'=>'required|string',
            'last_transaction_amount'=>'required|string',
            'the_last_deal_change'=>'required|string',
            'last_transaction_percentage'=>'required|string',
            'final_price_quantity'=>'required|string',
            'final_price_change'=>'required|string',
            'final_price_percent'=>'required|string',
            'the_least'=>'required|string',
            'the_most'=>'required|string',
            'date'=>'required|string',
        ];
    }
}
