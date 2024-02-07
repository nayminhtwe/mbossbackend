<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\AppUser;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class AppUserAttachmentTable extends DataTableComponent
{
    public $app_user_id;

    public function mount($app_user)
    {
        $this->app_user_id = $app_user->id;
    }

    public function query(): Builder
    {
        $query = AppUser::where('id', $this->app_user_id);

        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make(__('No')),
            Column::make(__('Name')),
            Column::make(__('NRC')),
            Column::make(__('Company Registration')),
            Column::make(__('Company Extract')),
            Column::make(__('Billing Statement')),
            Column::make(__('Business License')),
            Column::make(__('BOD Resolution')),
            Column::make(__('Import Export License')),
            // Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.seller.includes.attachment_row';
    }
}
