<?php

namespace App\Http\Livewire\Backend;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class CategoryTable extends DataTableComponent
{
    public function query(): Builder
    {
        $query =  Category::query();

        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')->sortable()->searchable(),
            Column::make(__('Payer Name'), ('name'))->sortable()->searchable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.category.includes.row';
    }
}
