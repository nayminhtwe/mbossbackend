<x-livewire-tables::bs4.table.cell>
    {{ $row->id }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->email }}
</x-livewire-tables::bs4.table.cell>

@if ($row->employmentNatureOfBusiness != null)
<x-livewire-tables::bs4.table.cell>
    {{ $row->employmentNatureOfBusiness. ' ( Employment )' }}
</x-livewire-tables::bs4.table.cell>
@elseif ($row->selfEmploymentNatureOfBusiness != null)
<x-livewire-tables::bs4.table.cell>
    {{ $row->selfEmploymentNatureOfBusiness. ' ( Self Employment )' }}
</x-livewire-tables::bs4.table.cell>
@endif

<x-livewire-tables::bs4.table.cell>
    {{ $row->phone }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->created_at }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.buyer-kyc.includes.actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell>