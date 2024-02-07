@if ($logged_in_user->hasAllAccess())
{{-- {{$row->seller_pending}} --}}
        <x-utils.create-buyer-info :href="route('admin.buyer-kyc.create', $row)" />
@endif