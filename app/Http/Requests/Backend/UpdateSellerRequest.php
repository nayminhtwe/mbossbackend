<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSellerRequest extends FormRequest
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
            'full_name' => ['required'],
            'father_name' => ['required'],
            'nrc_or_passport' => ['required'],
            'marital_status' => ['required'],
            'birth_date' => ['required'],
            'birth_place_country' => ['required'],
            'birth_place_city' => ['required'],
            'position' => ['required'],
            'nationality' => ['required'],
            'personal_landline' => [''],
            'personal_mobile' => ['required'],
            'authorized_person_full_name' => [''],
            'authorized_person_father_name' => [''],
            'authorized_person_mobile' => [''],
            'authorized_person_email' => [''],
            'personal_address_line_one' => ['required'],
            'personal_address_line_two' => [''],
            'country' => ['required'],
            'township' => ['required'],
            'state_or_division' => ['required'],
            'zip_code' => [''],
            'business_name' => ['required'],
            'business_email' => ['required','email'],
            'registration_number' => ['required'],
            'registration_date' => ['required'],
            'entity_type' => ['required'],
            'industry' => ['required'],
            'number_of_employees' => ['required'],
            'revenue_model' => [''],
            'clients' => [''],
            'ownership' => [''],
            'product_or_service' => ['required'],
            'net_worth_per_annum' => ['required'],
            'business_landline' => [''],
            'business_mobile' => ['required'],
            'business_address_line_one' => ['required'],
            'business_address_line_two' => [''],
            'business_country' => ['required'],
            'business_township' => ['required'],
            'business_state_or_division' => ['required'],
            'business_zip_code' => [''],
            'effective_date' => [''],
            'reference_one_full_name' => ['required'],
            'reference_one_father_name' => ['required'],
            'reference_one_nrc' => ['required'],
            'reference_one_address' => ['required'],
            'reference_one_mobile' => ['required'],
            'reference_one_position' => ['required'],
            'reference_one_email' => ['required','email'],
            'reference_two_full_name' => [''],
            'reference_two_father_name' => [''],
            'reference_two_nrc' => [''],
            'reference_two_address' => [''],
            'reference_two_mobile' => [''],
            'reference_two_position' => [''],
            'reference_two_email' => [],
            'reference_three_full_name' => [''],
            'reference_three_father_name' => [''],
            'reference_three_nrc' => [''],
            'reference_three_address' => [''],
            'reference_three_mobile' => [''],
            'reference_three_position' => [''],
            'reference_three_email' => [],
            'nrc_soft_copy' => '',
            'company_registration_soft_copy' => '',
            'company_extracts_soft_copy' => '',
            'billing_statement' => '',
            'business_license' => '',
            'bod_resolution' => '',
            'import_export_license' => '',
            'contract' => '',
            'other' => '',
        ];
    }
}
