<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tb_crm_mf_status_request extends FormRequest
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
            'code'                      => 'required|max:30',
            'name'                      => 'required|max:255',
            'is_for_posting'            => 'nullable',
            'is_cancelled'              => 'nullable',
            'is_posted'                 => 'nullable',
            'is_active'                 => 'nullable',
        ];
    }
}