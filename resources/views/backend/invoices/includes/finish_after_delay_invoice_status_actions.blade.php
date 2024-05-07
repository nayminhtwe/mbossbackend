@if ($logged_in_user->hasAllAccess())
    <x-utils.invoice-finish-button :href="route('admin.get_purchased_finish_after_delay', $invoice)" />
@endif