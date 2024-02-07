<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Kyc;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class KycTable extends DataTableComponent
{
    public function query(): Builder
    {
        $query =  Kyc::query();

        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')->sortable()->searchable(),
            Column::make(__('App User ID'), 'app_user_id')->sortable()->searchable(),
            Column::make(__('Full Name'), ('full_name'))->sortable()->searchable(),
            Column::make(__('NRC ID / Passport Number'), ('nrc_or_passport'))->sortable()->searchable(),
            Column::make(__('Position'), ('position'))->sortable()->searchable(),
            Column::make(__('Mobile Number'), ('personal_mobile'))->sortable()->searchable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.kyc.includes.row';
    }
}
