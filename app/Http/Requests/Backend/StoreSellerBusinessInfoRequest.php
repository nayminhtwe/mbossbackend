<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class StoreSellerBusinessInfoRequest extends FormRequest
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
            'reference_one_email' => ['required'],
            'reference_two_full_name' => [''],
            'reference_two_father_name' => [''],
            'reference_two_nrc' => [''],
            'reference_two_address' => [''],
            'reference_two_mobile' => [''],
            'reference_two_position' => [''],
            'reference_two_email' => [''],
            'reference_three_full_name' => [''],
            'reference_three_father_name' => [''],
            'reference_three_nrc' => [''],
            'reference_three_address' => [''],
            'reference_three_mobile' => [''],
            'reference_three_position' => [''],
            'reference_three_email' => [''],
        ];
    }
}
