@if ($invoice->status == 0)
    <span class="badge badge-warning">@lang('Pending')</span>
@elseif($invoice->status == 1)
    <span class="badge badge-success" data-toggle="tooltip"
        title="{{ $invoice->status }}">@lang('Finish')</span>
@endif