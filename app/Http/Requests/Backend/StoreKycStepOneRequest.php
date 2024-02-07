<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class StoreKycStepOneRequest extends FormRequest
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
            'app_user_id' => ['required'],
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
        ];
    }
}
