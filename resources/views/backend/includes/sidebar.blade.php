<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show --gray-background border-end border-black"
     id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <img src="{{ asset('img/brand/M-BOSS-Logo-crop.png#full') }}" class="img"
             alt="{{ asset('img/brand/M-BOSS-Logo-crop.png#full') }}" width="46" height="46">
        {{-- <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('img/brand/M-BOSS-Logo-crop.png#full') }}"></use>
        </svg> --}}
        <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('img/brand/M-BOSS-Logo-crop.png#full') }}"></use>
        </svg>
    </div><!--c-sidebar-brand-->

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('admin.dashboard')"
                :active="activeClass(Route::is('admin.dashboard'), 'c-active')"
                icon="c-sidebar-nav-icon cil-speedometer"
                :text="__('Dashboard')"/>
        </li>

        @if (
            $logged_in_user->hasAllAccess() ||
            (
                $logged_in_user->can('admin.access.user.list') ||
                $logged_in_user->can('admin.access.user.deactivate') ||
                $logged_in_user->can('admin.access.user.reactivate') ||
                $logged_in_user->can('admin.access.user.clear-session') ||
                $logged_in_user->can('admin.access.user.impersonate') ||
                $logged_in_user->can('admin.access.user.change-password')
            )
        )
            <li class="c-sidebar-nav-title">@lang('System')</li>

            <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.auth.user.*') || Route::is('admin.auth.role.*'), 'c-open c-show') }}">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-user"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Access')"/>

                <ul class="c-sidebar-nav-dropdown-items">
                    @if (
                        $logged_in_user->hasAllAccess() ||
                        (
                            $logged_in_user->can('admin.access.user.list') ||
                            $logged_in_user->can('admin.access.user.deactivate') ||
                            $logged_in_user->can('admin.access.user.reactivate') ||
                            $logged_in_user->can('admin.access.user.clear-session') ||
                            $logged_in_user->can('admin.access.user.impersonate') ||
                            $logged_in_user->can('admin.access.user.change-password')
                        )
                    )
                        <li class="c-sidebar-nav-item">
                            <x-utils.link
                                :href="route('admin.auth.user.index')"
                                class="c-sidebar-nav-link"
                                :text="__('User Management')"
                                :active="activeClass(Route::is('admin.auth.user.*'), 'c-active')"/>
                        </li>
                    @endif

                    @if ($logged_in_user->hasAllAccess())
                        <li class="c-sidebar-nav-item">
                            <x-utils.link
                                :href="route('admin.auth.role.index')"
                                class="c-sidebar-nav-link"
                                :text="__('Role Management')"
                                :active="activeClass(Route::is('admin.auth.role.*'), 'c-active')"/>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        @if ($logged_in_user->hasAllAccess())
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-list"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Logs')"/>

                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('log-viewer::dashboard')"
                            class="c-sidebar-nav-link"
                            :text="__('Dashboard')"/>
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('log-viewer::logs.list')"
                            class="c-sidebar-nav-link"
                            :text="__('Logs')"/>
                    </li>
                </ul>
            </li>

            <li class="c-sidebar-nav-dropdown">
                <x-utils.link href="#" icon="c-sidebar-nav-icon cil-people" class="c-sidebar-nav-dropdown-toggle"
                              :text="__('User Management')"/>

                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.appuser.index')" class="c-sidebar-nav-link"
                                      :text="__('User List')"/>
                    </li>


                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.wallet')" class="c-sidebar-nav-link"
                                      :text="__('User Wallet List')"/>
                    </li>

                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.transaction_log')" class="c-sidebar-nav-link"
                                      :text="__('User Transaction Log')"/>
                    </li>
                </ul>
            </li>

            <li class="c-sidebar-nav-dropdown">
                <x-utils.link href="#" icon="c-sidebar-nav-icon cil-money" class="c-sidebar-nav-dropdown-toggle"
                              :text="__('Invoice Management')"/>

                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.category.index')" class="c-sidebar-nav-link"
                                      :text="__('Payer List')"/>
                    </li>

                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.invoice.index')" class="c-sidebar-nav-link"
                                      :text="__('Pending Invoice List')"/>
                    </li>

                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.invoice.finished')" class="c-sidebar-nav-link"
                                      :text="__('Created Invoice List')"/>
                    </li>

                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.invoice.seller_approved_invoice_list')"
                                      class="c-sidebar-nav-link"
                                      :text="__('Seller Approved Invoice List')"/>
                    </li>

                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.invoice.deleted_invoice_list')" class="c-sidebar-nav-link"
                                      :text="__('Deleted Invoice List')"/>
                    </li>

                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.invoice.sale_ended_invoice_list')" class="c-sidebar-nav-link"
                                      :text="__('Sale Ended Invoice List')"/>
                    </li>

                    <li class="c-sidebar-nav-dropdown">
                        <x-utils.link href="#" icon="c-sidebar-nav-icon cil-dollar"
                                      class="c-sidebar-nav-dropdown-toggle"
                                      :text="__('Invoice Purchased')"/>

                        <ul class="c-sidebar-nav-dropdown-items">
                            <li class="c-sidebar-nav-item">
                                <x-utils.link :href="route('admin.invoice.purchased')" class="c-sidebar-nav-link"
                                              :text="__('Purchased Invoice List')"/>
                            </li>

                            <li class="c-sidebar-nav-item">
                                <x-utils.link :href="route('admin.invoice.purchased_status')" class="c-sidebar-nav-link"
                                              :text="__('Purchased Invoice Status')"/>
                            </li>

                            <li class="c-sidebar-nav-item">
                                <x-utils.link :href="route('admin.invoice.purchased_finished_list')"
                                              class="c-sidebar-nav-link"
                                              :text="__('Purchased Finish List')"/>
                            </li>

                            <li class="c-sidebar-nav-item">
                                <x-utils.link :href="route('admin.invoice.purchased_delayed_list')"
                                              class="c-sidebar-nav-link"
                                              :text="__('Purchased Delay List')"/>
                            </li>

                            <li class="c-sidebar-nav-item">
                                <x-utils.link :href="route('admin.invoice.purchased_default_list')"
                                              class="c-sidebar-nav-link"
                                              :text="__('Purchased Default List')"/>
                            </li>

                            <li class="c-sidebar-nav-item">
                                <x-utils.link :href="route('admin.invoice.purchased_finished_after_delay_list')"
                                              class="c-sidebar-nav-link"
                                              :text="__('Purchased Finish List (Delay)')"/>
                            </li>
                        </ul>

                    </li>

                </ul>
            </li>

            <li class="c-sidebar-nav-dropdown">
                <x-utils.link href="#" icon="c-sidebar-nav-icon cil-user-follow" class="c-sidebar-nav-dropdown-toggle"
                              :text="__('Seller Management')"/>

                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.personal-info.app_user')" class="c-sidebar-nav-link"
                                      :text="__('Seller Registration Form')"/>
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.personal-info.index')" class="c-sidebar-nav-link"
                                      :text="__('Seller Approved List')"/>
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.seller.pending')" class="c-sidebar-nav-link"
                                      :text="__('Seller Entry Pending List')"/>
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.seller.request')" class="c-sidebar-nav-link"
                                      :text="__('Seller Request List')"/>
                    </li>
                </ul>
            </li>

            <li class="c-sidebar-nav-dropdown">
                <x-utils.link href="#" icon="c-sidebar-nav-icon cil-user-follow" class="c-sidebar-nav-dropdown-toggle"
                              :text="__('Buyer Management')"/>

                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.buyer-kyc.app_user')" class="c-sidebar-nav-link"
                                      :text="__('Buyer Registration Form')"/>
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.buyer-kyc.index')" class="c-sidebar-nav-link"
                                      :text="__('Buyer Approved List')"/>
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link :href="route('admin.buyer-kyc.request')" class="c-sidebar-nav-link"
                                      :text="__('Buyer Request List')"/>
                    </li>

                </ul>
            </li>

        @endif
    </ul>

    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
            data-class="c-sidebar-minimized"></button>
</div><!--sidebar-->
