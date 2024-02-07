@if ($invoice->purchase == 0)
    <span class="badge badge-warning">@lang('No')</span>
@elseif($invoice->purchase == 1)
    <span class="badge badge-success">@lang('Yes')</span>
@endif