@if ($invoice->repayment_amount == null)
    <span class="badge badge-success">@lang('Finished on time')</span>
@elseif($invoice->repayment_amount != null)
    <span class="badge badge-success">@lang('Finished after Delay')</span>
@endif