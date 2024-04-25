@if ($logged_in_user->hasAllAccess())
<x-utils.approve-button :href="route('admin.seller-request.admin_approve', $row)" />
@endif