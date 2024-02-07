@if ($logged_in_user->hasAllAccess())
    <x-utils.view-button :href="route('admin.invoice.show', $invoice)" />

    {{-- <x-utils.edit-button :href="route('admin.invoice.edit', $invoice)" /> --}}

    {{-- <x-utils.delete-button :href="route('admin.invoice.destroy', $invoice)" /> --}}
@endif