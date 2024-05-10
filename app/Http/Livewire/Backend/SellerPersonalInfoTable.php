<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\SellerPersonalInfo;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SellerPersonalInfoTable extends DataTableComponent
{
    public function query(): Builder
    {
        $query =  SellerPersonalInfo::whereHas('app_user', function ($query) {
            $query->where('seller_status', 1);
        });

        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')->sortable()->searchable(),
            // Column::make(__('App User ID'), 'app_user_id')->sortable()->searchable(),
            Column::make(__('Full Name'), ('full_name'))->sortable()->searchable(),
            Column::make(__('Business Name'), ('app_user.business_info.business_name'))->sortable()->searchable(),
            // Column::make(__('NRC ID / Passport Number'), ('nrc_or_passport'))->sortable()->searchable(),
            // Column::make(__('Position'), ('position'))->sortable()->searchable(),
            Column::make(__('Personal Mobile'), ('personal_mobile'))->sortable()->searchable(),
            Column::make(__('Business Mobile'), ('app_user.business_info.business_mobile'))->sortable()->searchable(),
            Column::make(__('Product/Service'), ('app_user.business_info.product_or_service'))->sortable()->searchable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.seller.includes.row';
    }
}
