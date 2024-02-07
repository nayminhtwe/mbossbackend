<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Invoice;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PendingInvoiceTable extends DataTableComponent
{
    // public function render()
    // {
    //     return view('livewire.backend.pending-invoice-table');
    // }

    public function query(): Builder
    {
        $query =  Invoice::where('status', 0)->with('category')->orderBy('id', 'desc');
        
        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')->sortable()->searchable(),
            Column::make(__('Invoice ID'), ('title'))->searchable()->sortable(),
            Column::make(__('Original Invoice Amount'), ('price'))->searchable()->sortable(),
            Column::make(__('Payer Name'), ('category.name'))->searchable()->sortable(),
            Column::make(__('Terms'), ('terms'))->searchable()->sortable(),
            Column::make(__('Status'))->sortable(),
            Column::make(__('Created_At'), ('created_at'))->sortable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.invoices.includes.approve_row';
    }
}
