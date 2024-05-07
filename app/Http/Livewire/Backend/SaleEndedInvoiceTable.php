<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Invoice;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SaleEndedInvoiceTable extends DataTableComponent
{
    // public function render()
    // {
    //     return view('livewire.backend.sale-ended-invoice-table');
    // }

    public function query(): Builder
    {
        $query =  Invoice::where('delete_status', 1)->onlyTrashed();
        
        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')->sortable()->searchable(),
            Column::make(__('Invoice ID'), ('title'))->searchable()->sortable(),
            Column::make(__('Original Invoice Amount'), ('price'))->searchable()->sortable(),
            Column::make(__('Payer Name'), ('category.name'))->searchable()->sortable(),
            Column::make(__('Place'), ('place'))->searchable()->sortable(),
            Column::make(__('Terms'), ('terms'))->searchable()->sortable(),
            Column::make(__('Due'), ('date'))->searchable()->sortable(),
            Column::make(__('Ended_At'), ('deleted_at'))->sortable(),
            // Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.invoices.includes.deleted_row';
    }
}
