<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class AppUser extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userID', 'phone', 'email', 'firstName', 'profilePictureURL', 'appIdentifier', 'password', 'seller_status', 'lastName', 'nrc', 'date_of_birth', 'permanentAddress', 'currentAddress', 'age', 'bankName', 'bankAcc', 'bankNameOptional', 'bankAccOptional', 'buyer_status', 'seller_request_count', 'buyer_request_count', 'seller_submitted', 'buyer_submitted','seller_buyer_status','wallet'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }

    public function buyer_kyc()
    {
        return $this->hasOne(BuyerKyc::class);
    }

    public function seller_pending()
    {
        return $this->hasOne(SellerPending::class);
    }

    public function business_info()
    {
        return $this->hasOne(SellerBusinessInfo::class);
    }

    public function seller_nrc_file()
    {
        return $this->hasOne(SellerNrcFile::class);
    }

    public function seller_company_registration_file()
    {
        return $this->hasOne(SellerCompanyRegistrationFile::class);
    }

    public function seller_company_extract_file()
    {
        return $this->hasOne(SellerCompanyExtractFile::class);
    }

    public function seller_company_billing_statement_file()
    {
        return $this->hasOne(SellerCompanyBillingStatementFile::class);
    }

    public function seller_business_license_file()
    {
        return $this->hasOne(SellerBusinessLicenseFile::class);
    }

    public function seller_bod_resolution_file()
    {
        return $this->hasOne(SellerBodResolutionFile::class);
    }

    public function seller_import_export_license_file()
    {
        return $this->hasOne(SellerImportExportLicenseFile::class);
    }

    public function file_upload()
    {
        return $this->hasMany(FileUpload::class);
    }

    public function seller_buyer_request()
    {
        return $this->hasMany(SellerBuyerRequest::class);
    }

    public function seller_company_extract_file_request()
    {
        return $this->hasMany(SellerCompanyExtractFileRes::class);
    }

    public function seller_business_license_file_request()
    {
        return $this->hasMany(SellerBusinessLicenseFileRes::class);
    }

    public function seller_bod_resolution_file_request()
    {
        return $this->hasMany(SellerBodResolutionFileRes::class);
    }

    public function seller_import_export_license_file_request()
    {
        return $this->hasMany(SellerImExLicenseFileRequest::class);
    }
}
