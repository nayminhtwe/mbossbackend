@if ($logged_in_user->hasAllAccess())
    @if ($row->seller_pending->company_extract_file == 0)
        <x-utils.create-attachment :href="route('admin.company-extract.create', $row)" />
    @else
        <span class="btn btn-success btn-sm" icon="fas fa-check" :text="__('Finished')">@lang('Finished')</span>
    
    @endif
@endif