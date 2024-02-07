@if ($seller_pending->business_license_file == 0)
    <span class="badge badge-warning">@lang('Pending')</span>
@elseif($seller_pending->business_license_file == 1)
    <span class="badge badge-success" data-toggle="tooltip"
        title="{{ $seller_pending->business_license_file }}">@lang('Finished')</span>
@endif