@if ($logged_in_user->hasAllAccess())
    <x-utils.view-button :href="route('admin.invoice.show', $invoice)" />

    <x-utils.end-sale-button :href="route('admin.end_sale', $invoice)" />

    {{-- <x-utils.edit-button :href="route('admin.invoice.edit', $invoice)" /> --}}
@endif