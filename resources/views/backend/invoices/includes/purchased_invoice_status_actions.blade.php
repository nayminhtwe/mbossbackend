@if ($logged_in_user->hasAllAccess())
    <x-utils.invoice-finish-button :href="route('admin.purchased_finish', $invoice)" />

    <x-utils.invoice-delay-button :href="route('admin.purchased_pending', $invoice)" />

    <x-utils.invoice-default-button :href="route('admin.purchased_default', $invoice)" />
@endif