<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\SellerPending;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SellerPendingTable extends DataTableComponent
{
    public function query(): Builder
    {
        $query =  SellerPending::whereHas('app_user', function ($query) {
            $query->where('seller_status', 0)->where('seller_buyer_status', 1);
        });

        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')->sortable()->searchable(),
            Column::make(__('Name'),('app_user.firstName'))->sortable()->searchable(),
            Column::make(__('Email'), ('app_user.email'))->sortable()->searchable(),
            Column::make(__('Phone'), ('app_user.phone'))->sortable()->searchable(),
            Column::make(__('Personal Info'), ('personal_info')),
            Column::make(__('Business Info'), ('business_info')),
            Column::make(__('NRC File'), ('nrc_file')),
            Column::make(__('Company Registration File'), ('company_registration_file')),
            Column::make(__('Company Extract File'), ('company_extract_file')),
            Column::make(__('Billing Statement'), ('company_billing_statement_file')),
            Column::make(__('Business License'), ('business_license_file')),
            Column::make(__('BOD Resolution'), ('bod_resolution_file')),
            Column::make(__('Import Export License'), ('import_export_license_file')),
            Column::make(__('Contract'), ('contract_file')),
            Column::make(__('Others'), ('other_file')),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.seller.includes.pending_row';
    }
}
