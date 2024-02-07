<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\TransactionLog;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class TransactionLogTable extends DataTableComponent
{
    public function query(): Builder
    {
        $query = TransactionLog::with('app_user');

        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make(__('No'),('id'))->sortable()->searchable(),
            Column::make(__('App User ID'),('app_user.id'))->sortable()->searchable(),
            Column::make(__('App User Name'),('app_user.firstName'))->sortable()->searchable(),
            Column::make(__('Amount'),('amount'))->sortable()->searchable(),
            Column::make(__('Received'),('received'))->sortable()->searchable(),
            Column::make(__('Transfer'),('transfer'))->sortable()->searchable(),
            Column::make(__('Created At'), ('created_at'))->searchable(),
        ];
    }

    public function rowView(): string
    {
        return 'backend.appusers.includes.transaction_log_row';
    }
}
