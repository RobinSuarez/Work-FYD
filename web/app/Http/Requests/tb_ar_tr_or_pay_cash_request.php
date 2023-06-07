<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tb_ar_tr_or_pay_cash_request extends FormRequest
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
            'or_id'               => 'required',
            //'amount'              => ['regex:/^[0-9]{1,3}(,[0-9]{3})*\.[0-9]+$/', 'required'],
            'amount'              => 'required|numeric',
            'ref_no'              => 'required|max:30',
            'ref_date'            => 'required',
            'remarks'             => 'nullable|max:1000',
        ];
    } 
}
