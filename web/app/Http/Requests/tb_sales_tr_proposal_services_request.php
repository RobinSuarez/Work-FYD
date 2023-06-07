<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tb_sales_tr_proposal_services_request extends FormRequest
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
            'proposal_id'         => 'required',
            'service_id'          => 'required',
            'qty'                 => 'required',
            'uom_id'              => 'required',
            'price'               => 'required|numeric',
            'with_vat'            => 'nullable',
            'seq'                 => 'required|numeric',
        ];
    }
}
