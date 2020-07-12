<div class="sl-logo"><a href=""> USPS Mail Holding</a></div>
<span id="vueNav">
<div class="sl-sideleft">

    <label class="sidebar-label">Navigation</label>
    <div class="sl-sideleft-menu">
        <a href="{{route('admin.index')}}" class="sl-menu-link active">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Dashboard</span>
            </div>
        </a>
 <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon ion-android-cart tx-20"></i>
                <span class="menu-item-label">Orders</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('admin.allOrders')}}" class="nav-link">All Orders</a></li>
            <li class="nav-item" v-for="status in allOrderStatus"><a v-bind:href="siteUrl+'/admin/all-orders/bystatus/'+status.id" class="nav-link" v-text="status.name"></a></li>
        </ul>

        <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="menu-item-icon ion-android-calendar tx-20"></i>
                        <span class="menu-item-label">Renewals</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="{{route('admin.allRenewalByDate')}}" class="nav-link">Today</a></li>
                    <li class="nav-item"><a href="{{route('admin.allRenewalDates')}}" class="nav-link">All</a></li>
                </ul>
        <a href="{{route('admin.allUpdatedOrders')}}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-cart-outline tx-20"></i>
                <span class="menu-item-label">Updated Orders</span>
            </div>
        </a>
        <a href="{{route('admin.allCancelledOrders')}}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-trash-a tx-20"></i>
                <span class="menu-item-label">Cancelled Orders</span>
            </div>
        </a>
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="menu-item-icon ion-code-working tx-20"></i>
                        <span class="menu-item-label">Scripts</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="{{route('admin.addScript.header')}}" class="nav-link">New header</a></li>
                    <li class="nav-item"><a href="{{route('admin.allHeaderScripts')}}" class="nav-link">All header scripts</a></li>
                    <li class="nav-item"><a href="{{route('admin.addScript.thankYou')}}" class="nav-link">New thank you</a></li>
                    <li class="nav-item"><a href="{{route('admin.allThankYouScripts')}}" class="nav-link">All thank you scripts</a></li>
                    <li class="nav-item"><a href="{{route('admin.addScript.Dispute')}}" class="nav-link">New dispute</a></li>
                    <li class="nav-item"><a href="{{route('admin.allDisputeScripts')}}" class="nav-link">All dispute scripts</a></li>
                </ul>

                <a href="{{route('admin.allContacts')}}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-email tx-20"></i>
                <span class="menu-item-label">Messages</span>
            </div>
        </a>


            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="fa fa-user-secret tx-20"></i>
                    <span class="menu-item-label">Admins</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div>
            </a>
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{route('admin.admins')}}" class="nav-link">All Admin</a></li>
                <li class="nav-item"><a href="{{route('admin.admin.create')}}" class="nav-link">Create Admin</a></li>
            </ul>

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon ion-location tx-20"></i>
                <span class="menu-item-label">Address API</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('admin.createAddressApi')}}" class="nav-link">Create new</a></li>
            <li class="nav-item"><a href="{{route('admin.allAddressApi')}}" class="nav-link">All</a></li>
        </ul>



        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon ion-stats-bars tx-20"></i>
                <span class="menu-item-label">Statuses for order</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('admin.createStatus')}}" class="nav-link">Create new</a></li>
            <li class="nav-item"><a href="{{route('admin.allStatus')}}" class="nav-link">All</a></li>
        </ul>

{{--        Single Menu Example--}}
{{--        <a href="widgets.html" class="sl-menu-link">--}}
{{--            <div class="sl-menu-item">--}}
{{--                <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>--}}
{{--                <span class="menu-item-label">Cards &amp; Widgets</span>--}}
{{--            </div><!-- menu-item -->--}}
{{--        </a><!-- sl-menu-link -->--}}

        {{--        Dropdown menu Example--}}
{{--        <a href="#" class="sl-menu-link">--}}
{{--            <div class="sl-menu-item">--}}
{{--                <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>--}}
{{--                <span class="menu-item-label">Charts</span>--}}
{{--                <i class="menu-item-arrow fa fa-angle-down"></i>--}}
{{--            </div><!-- menu-item -->--}}
{{--        </a><!-- sl-menu-link -->--}}
{{--        <ul class="sl-menu-sub nav flex-column">--}}
{{--            <li class="nav-item"><a href="chart-morris.html" class="nav-link">Morris Charts</a></li>--}}
{{--        </ul>--}}



    </div><!-- sl-sideleft-menu -->

    <br>
</div><!-- sl-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->

<!-- ########## START: HEAD PANEL ########## -->
@include('inc.admin.nav.head')
<!-- ########## END: HEAD PANEL ########## -->

<!-- ########## START: RIGHT PANEL ########## -->
@include('inc.admin.nav.right')
<!-- ########## END: RIGHT PANEL ########## --->
</span>
