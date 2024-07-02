<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\AppUser;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class WalletTable extends DataTableComponent
{
    // public function render()
    // {
    //     return view('livewire.backend.wallet-table');
    // }

    public function query(): Builder
    {
        $query = AppUser::where(function($query) {
            return $query->where('seller_status', 1)->orWhere('buyer_status', 1);
        });

        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make(__('No'),('id'))->sortable()->searchable(),
            Column::make(__('Name'),('firstName'))->sortable()->searchable(),
            Column::make(__('Email'), 'email')->sortable()->searchable(),
            Column::make(__('Phone Number'),('phone'))->sortable()->searchable(),
            Column::make(__('Wallet'),('wallet'))->sortable()->searchable(),
            Column::make(__('Created At'), ('created_at'))->searchable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.appusers.includes.wallet_row';
    }
}
