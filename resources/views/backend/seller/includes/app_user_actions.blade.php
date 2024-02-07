@if ($logged_in_user->hasAllAccess())
{{-- {{$row->seller_pending}} --}}
    @if ($row->seller_pending->personal_info == 0)
        <x-utils.create-personal-info :href="route('admin.personal-info.create', $row)" />
    {{-- @else
        <span class="btn btn-info btn-sm" icon="fas fa-check" :text="__('Finished')">@lang('Finished')</span> --}}
    @endif
    @if ($row->seller_pending->business_info == 0)
        <x-utils.create-business-info :href="route('admin.business-info.create', $row)" />
    @endif
    @if ($row->seller_pending->nrc_file == 0 ||
            $row->seller_pending->compnay_registration_file == 0 ||
            $row->seller_pending->company_extract_file == 0 ||
            $row->seller_pending->company_billing_statement_file == 0 ||
            $row->seller_pending->business_license_file == 0 ||
            $row->seller_pending->bod_resolution_file == 0)

            <x-utils.create-attachment :href="route('admin.seller.attachment', $row)" />

    @endif
@endif