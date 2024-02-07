@if ($seller_pending->personal_info == 0)
    <span class="badge badge-warning">@lang('Pending')</span>
@elseif($seller_pending->personal_info == 1)
    <span class="badge badge-success" data-toggle="tooltip"
        title="{{ $seller_pending->personal_info }}">@lang('Finished')</span>
@endif