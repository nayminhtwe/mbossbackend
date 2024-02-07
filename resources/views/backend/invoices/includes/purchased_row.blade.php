<x-livewire-tables::bs4.table.cell>
    {{ $row->id }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->title }}
</x-livewire-tables::bs4.table.cell>

{{-- <x-livewire-tables::bs4.table.cell>
    {{ $row->description }}
</x-livewire-tables::bs4.table.cell> --}}

<x-livewire-tables::bs4.table.cell>
    {{ $row->price }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->purchase_amount }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->category->name }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->terms }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->purchase_at }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->app_user->id }}
</x-livewire-tables::bs4.table.cell>

{{-- <x-livewire-tables::bs4.table.cell>
    @include('backend.invoices.includes.finished_actions', ['invoice' => $row])
</x-livewire-tables::bs4.table.cell> --}}
