@if ($logged_in_user->hasAllAccess())
    @if ($row->seller_pending->bod_resolution_file == 0)
        <x-utils.create-attachment :href="route('admin.bod-resolution.create', $row)" />
    @else
        <span class="btn btn-success btn-sm" icon="fas fa-check" :text="__('Finished')">@lang('Finished')</span>
    
    @endif
@endif