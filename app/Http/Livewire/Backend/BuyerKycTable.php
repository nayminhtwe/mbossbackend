<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\BuyerKyc;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class BuyerKycTable extends DataTableComponent
{
    public function query(): Builder
    {
        $query = BuyerKyc::whereHas('app_user', function ($query) {
            $query->where('buyer_status', 1);
        });

        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make(__('No'),('id'))->sortable()->searchable(),
            Column::make(__('Name'),('app_user.firstName'))->sortable()->searchable(),
            Column::make(__('Email'), ('app_user.email'))->sortable()->searchable(),
            Column::make(__('Phone Number'),('phone'))->sortable()->searchable(),
            Column::make(__('Created At'), ('created_at'))->searchable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.buyer-kyc.includes.row';
    }
}
