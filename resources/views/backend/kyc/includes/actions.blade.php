@if ($logged_in_user->hasAllAccess())

<x-utils.view-button :href="route('admin.kyc.show', $row)" />

<x-utils.edit-button :href="route('admin.kyc.edit', $row)" />

{{-- <x-utils.delete-button :href="route('admin.category.destroy', $row)" /> --}}
@endif