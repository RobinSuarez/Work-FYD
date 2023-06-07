<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tb_sales_tr_proposal_request extends FormRequest
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
            'salesman_id'               => 'required',
            'company_id'                => 'required',
            'version_id'                => 'required|numeric',
            'amount'                    => 'required|numeric',
            'tax_type_id'               => 'required',
            'status_id'                 => 'nullable',
            'remarks'                   => 'nullable',
        ];
    }
}
