@if ($logged_in_user->hasAllAccess())

<x-utils.create-button :href="route('admin.kyc.create_step_one', $row)" />

@endif