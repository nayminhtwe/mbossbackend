@if ($row->transfer == 0)
    <span class="badge badge-warning">@lang('X')</span>
@elseif($row->transfer == 1)
    <span class="badge badge-success" data-toggle="tooltip"
        title="{{ $row->transfer }}">@lang('YES')</span>
@endif