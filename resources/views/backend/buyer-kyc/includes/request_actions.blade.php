@if ($logged_in_user->hasAllAccess())

    <x-utils.view-button :href="route('admin.buyer-kyc-request.show', $row)" />

    <x-utils.approve-button :href="route('admin.buyer-kyc-request.approve', $row)" />

    {{-- @if ($row->seller_pending->personal_info == 0)
        <x-utils.create-personal-info :href="route('admin.personal-info.create', $row)" /> --}}
    {{-- @else
        <span class="btn btn-info btn-sm" icon="fas fa-check" :text="__('Finished')">@lang('Finished')</span> --}}
    {{-- @endif
    @if ($row->seller_pending->business_info == 0)
        <x-utils.create-business-info :href="route('admin.business-info.create', $row)" />
    @endif --}}
@endif