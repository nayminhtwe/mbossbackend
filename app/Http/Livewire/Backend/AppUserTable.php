<?php

namespace App\Http\Livewire\Backend;

use App\Models\AppUser;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class AppUserTable extends DataTableComponent
{
//    public function render()
//    {
//        return view('livewire.backend.app-user-table');
//    }

    public function query(): Builder
    {
        $query = AppUser::query();

        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), ('id'))->sortable()->searchable(),
            Column::make(__('Name'), ('firstName'))->sortable()->searchable(),
            Column::make(__('Email'), 'email')->sortable()->searchable(),
            Column::make(__('Phone Number'), ('phone'))->sortable()->searchable(),
            Column::make(__('Created At'), ('created_at'))->searchable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.appusers.includes.row';
    }


}
