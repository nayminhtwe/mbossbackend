@if ($logged_in_user->hasAllAccess())
    @if ($row->seller_pending->compnay_registration_file == 0)
        <x-utils.create-attachment :href="route('admin.company-registration.create', $row)" />
    @else
        <span class="btn btn-success btn-sm" icon="fas fa-check" :text="__('Finished')">@lang('Finished')</span>
    @endif
@endif