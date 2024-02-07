@if ($logged_in_user->hasAllAccess())

<x-utils.pw-reset :href="route('admin.resetform', $row)" />

@endif