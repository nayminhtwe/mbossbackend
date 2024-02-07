@if ($logged_in_user->hasAllAccess())

<x-utils.view-button :href="route('admin.personal-info.show', $row)" />

<x-utils.edit-button :href="route('admin.personal-info.edit', $row)" />

{{-- <x-utils.delete-button :href="route('admin.category.destroy', $row)" /> --}}
@endif