<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\AppUser;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SellerRequestTable extends DataTableComponent
{
    public function query(): Builder
    {
        $query =  AppUser::whereHas('file_upload', function ($query) {
            $query->where('kyc_status', 1);
        })->whereHas('seller_buyer_request', function ($query) {
            $query->where('kyc_status', 1)->where('seller_finish_status', 0);
        });

        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')->sortable()->searchable(),
            Column::make(__('Name'),('firstName'))->sortable()->searchable(),
            Column::make(__('Phone'), ('phone'))->sortable()->searchable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.seller.includes.request_row';
    }
}
