@if ($logged_in_user->hasAllAccess())

<x-utils.view-button :href="route('admin.category.show', $row)" />

<x-utils.edit-button :href="route('admin.category.edit', $row)" />

<x-utils.delete-button :href="route('admin.category.destroy', $row)" />

@endif