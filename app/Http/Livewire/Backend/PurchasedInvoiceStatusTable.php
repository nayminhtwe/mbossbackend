<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Invoice;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PurchasedInvoiceStatusTable extends DataTableComponent
{
    public function query(): Builder
    {
        $query =  Invoice::where('status', '1')->where('purchase', 1)->where('finish_status', 0)->with('category')->orderBy('id', 'desc');
        
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
            Column::make(__('Purchased User ID'), ('app_user.id'))->sortable(),
            Column::make(__('Purchased User Name'), ('app_user.firstName'))->sortable(),
            Column::make(__('Purchased_At'), ('purchase_at'))->sortable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.invoices.includes.purchased_invoice_status_row';
    }
}
