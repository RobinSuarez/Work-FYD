<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tb_ar_tr_or_request extends FormRequest
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
            'date'                      => 'required|date',
            'no'                        => 'required|max:30',
            'client_id'                 => 'required',
            'total_cash_amount'         => 'required',
            'total_check_amount'        => 'required',
            'total_applied'             => 'required',
            'status_id'                 => 'nullable',
            'remarks'                   => 'nullable',
        ];
    }
}
