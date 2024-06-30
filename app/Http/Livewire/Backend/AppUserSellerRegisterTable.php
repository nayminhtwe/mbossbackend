<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\AppUser;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class AppUserSellerRegisterTable extends DataTableComponent
{
    // public function render()
    // {
    //     return view('livewire.backend.app-user-seller-register-table');
    // }

    public function query(): Builder
    {
        $query = AppUser::where('seller_status', 0)->where('seller_request_count', 1);

        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make(__('No'),('id'))->sortable()->searchable(),
            Column::make(__('Email'), 'email')->sortable()->searchable(),
            Column::make(__('Phone Number'),('phone'))->sortable()->searchable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.seller.includes.app_user_row';
    }
}
