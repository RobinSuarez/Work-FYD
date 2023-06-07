<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tb_ar_tr_or_app_request extends FormRequest
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
            'lr_ar_cust_id'       => 'required',
            'amount_applied'      => 'required|numeric',
            'remarks'             => 'nullable|max:1000'
        ];
    }
}
