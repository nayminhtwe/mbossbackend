@if ($row->received == 0)
    <span class="badge badge-warning">@lang('X')</span>
@elseif($row->received == 1)
    <span class="badge badge-success" data-toggle="tooltip"
        title="{{ $row->received }}">@lang('YES')</span>
@endif