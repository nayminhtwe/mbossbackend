<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class StoreBuyerKycRequest extends FormRequest
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
            'name' => ['required'],
            'dateOfBirth' => ['required'],
            'fatherName' => ['required'],
            'nationality' => ['required'],
            'nrc_or_passport' => ['required'],
            'qualifications' => ['required'],
            'occupation' => ['required'],
            'maritalStatus' => ['required'],
            'nameOfSpouse' => [''],
            'spouse_nrc_or_passport' => [''],
            'permanentAddress' => ['required'],
            'currentAddress' => ['required'],
            'postalAddress' => ['required'],
            'phone' => ['required'],
            'email' => ['required'],
            'employmentNatureOfBusiness' => [''],
            'employmentPosition' => [''],
            'employmentYearsOfService' => [''],
            'employerName' => [''],
            'employerAddress' => [''],
            'officeContactNo' => [''],
            'selfEmploymentNatureOfBusiness' => [''],
            'revenueModel' => [''],
            'annualIncome' => ['required'],
            'sourceOfFund' => ['required'],
            'bankAcc' => [''],
            'bankName' => [''],
            'bankBranch' => [''],
            'typeOfAccount' => [''],
            'contactName' => ['required'],
            'contact_nrc_or_passport' => ['required'],
            'contactRelationship' => ['required'],
            'contactNationality' => ['required'],
            'contactPhone' => ['required'],
            'contactEmail' => ['required'],
            'authorizePersonName' => ['required'],
            'authorize_person_nrc_or_passport' => ['required'],
            'nrc_soft_copy' => ['required'],
            'bank_book_soft_copy' => ['required'],
            'household_registration_soft_copy' => [''],
            'authorize_person_nrc_soft_copy' => ['']
        ];
    }
}
