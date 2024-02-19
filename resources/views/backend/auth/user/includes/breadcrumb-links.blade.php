<x-utils.link
    class="c-subheader-nav-link text-white {{ request()->path() !== 'admin/auth/user/deactivated' ? 'opacity-50' : '' }}"
    :href="route('admin.auth.user.deactivated')"
    :text="__('Deactivated Users')"
    permission="admin.access.user.reactivate"/>

@if ($logged_in_user->hasAllAccess())
    <x-utils.link
            class="c-subheader-nav-link text-white {{ request()->path() !== 'admin/auth/user/deleted' ? 'opacity-50' : '' }}"
            :href="route('admin.auth.user.deleted')" :text="__('Deleted Users')"/>
@endif
