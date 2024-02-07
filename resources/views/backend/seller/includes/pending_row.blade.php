<x-livewire-tables::bs4.table.cell>
    {{ $row->id }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->app_user->firstName }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->app_user->email }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->app_user->phone }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.seller.includes.personal_info_status', ['seller_pending' => $row])
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.seller.includes.business_info_status', ['seller_pending' => $row])
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.seller.includes.nrc_status', ['seller_pending' => $row])
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.seller.includes.company_registration_status', ['seller_pending' => $row])
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.seller.includes.company_extract_status', ['seller_pending' => $row])
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.seller.includes.billing_statement_status', ['seller_pending' => $row])
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.seller.includes.business_license_status', ['seller_pending' => $row])
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.seller.includes.bod_resolution_status', ['seller_pending' => $row])
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.seller.includes.import_export_license_status', ['seller_pending' => $row])
</x-livewire-tables::bs4.table.cell>


{{-- <x-livewire-tables::bs4.table.cell>
    @include('backend.seller.includes.app_user_actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell> --}}