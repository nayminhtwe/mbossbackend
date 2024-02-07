@if ($logged_in_user->hasAllAccess())
    <x-utils.view-button :href="route('admin.invoice.show', $invoice)" />

    @if ($invoice->seller_approval == 0)
    <x-utils.edit-button :href="route('admin.invoice.edit', $invoice)" />

    <x-utils.delete-button :href="route('admin.invoice.destroy', $invoice)" />
    @endif
@endif