@if ($logged_in_user->hasAllAccess())
    @if ($row->seller_pending->company_billing_statement_file == 0)
        <x-utils.create-attachment :href="route('admin.billing-statement.create', $row)" />
    @else
        <span class="btn btn-success btn-sm" icon="fas fa-check" :text="__('Finished')">@lang('Finished')</span>
    
    @endif
@endif