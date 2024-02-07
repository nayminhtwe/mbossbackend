@if ($logged_in_user->hasAllAccess())

<x-utils.view-button :href="route('admin.buyer-kyc.show', $row)" />

<x-utils.edit-button :href="route('admin.buyer-kyc.edit', $row)" />

@endif