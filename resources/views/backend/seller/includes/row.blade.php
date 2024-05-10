<x-livewire-tables::bs4.table.cell>
    {{ $row->id }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->app_user_id }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->full_name }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->app_user->business_info->business_name }}
</x-livewire-tables::bs4.table.cell>

{{-- <x-livewire-tables::bs4.table.cell>
    {{ $row->nrc_or_passport }}
</x-livewire-tables::bs4.table.cell> --}}

{{-- <x-livewire-tables::bs4.table.cell>
    {{ $row->position }}
</x-livewire-tables::bs4.table.cell> --}}

<x-livewire-tables::bs4.table.cell>
    {{ $row->personal_mobile }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->app_user->business_info->business_mobile }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->app_user->business_info->product_or_service }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.seller.includes.actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell>