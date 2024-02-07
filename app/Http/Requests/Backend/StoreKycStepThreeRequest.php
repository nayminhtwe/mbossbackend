<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class StoreKycStepThreeRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nrc_soft_copy' => 'required|mimes:png,jpg,pdf,jpeg',
            'company_registration_soft_copy' => 'required|mimes:png,jpg,pdf,jpeg',
            'company_extracts_soft_copy' => 'required|mimes:png,jpg,pdf,jpeg',
            'billing_statement' => 'required|mimes:png,jpg,pdf,jpeg',
            'business_license' => 'required|mimes:png,jpg,pdf,jpeg',
            'bod_resolution' => 'required|mimes:png,jpg,pdf,jpeg',
            'import_export_license' => 'mimes:png,jpg,pdf,jpeg',
        ];
    }
}
