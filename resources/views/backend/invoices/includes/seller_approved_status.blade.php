@if ($invoice->seller_approval == 0)
    <span class="badge badge-warning">@lang('No')</span>
@elseif($invoice->seller_approval == 1)
    <span class="badge badge-success">@lang('Yes')</span>
@endif