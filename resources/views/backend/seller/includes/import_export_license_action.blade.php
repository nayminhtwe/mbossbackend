@if ($logged_in_user->hasAllAccess())
    @if ($row->seller_pending->import_export_license_file == 0)
        <x-utils.create-attachment :href="route('admin.import-export-license.create', $row)" />
    @else
        <span class="btn btn-success btn-sm" icon="fas fa-check" :text="__('Finished')">@lang('Finished')</span>
    
    @endif
@endif