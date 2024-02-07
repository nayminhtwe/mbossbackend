@if ($seller_pending->nrc_file == 0)
    <span class="badge badge-warning">@lang('Pending')</span>
@elseif($seller_pending->nrc_file == 1)
    <span class="badge badge-success" data-toggle="tooltip"
        title="{{ $seller_pending->nrc_file }}">@lang('Finished')</span>
@endif