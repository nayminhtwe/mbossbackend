@if ($seller_pending->business_info == 0)
    <span class="badge badge-warning">@lang('Pending')</span>
@elseif($seller_pending->business_info == 1)
    <span class="badge badge-success" data-toggle="tooltip"
        title="{{ $seller_pending->business_info }}">@lang('Finished')</span>
@endif