@if ($logged_in_user->hasAllAccess())
    <x-utils.invoice-create-button :href="route('admin.get_invoice_approve', $invoice)" />

    <x-utils.view-button :href="route('admin.invoice.show', $invoice)" />

    <x-utils.delete-button :href="route('admin.invoice.destroy', $invoice)" />

@endif