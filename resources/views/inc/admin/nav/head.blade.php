<div class="sl-header">
    <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
    </div><!-- sl-header-left -->
    <div class="sl-header-right">
        <nav class="nav">
            <div class="dropdown">
                <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">

                    <span class="logged-name">{{Auth::user()->name}}</span>
                    <i class="fa fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-header wd-200">
                    <ul class="list-unstyled user-profile-nav">
{{--                        <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>--}}
{{--                        <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>--}}

                        <li><a href="{{route('admin.passwordReset')}}"><i class="icon ion-settings"></i>Settings</a></li>
                        <li><a href="{{route('admin.logout')}}"><i class="icon ion-power"></i> Sign Out</a></li>
                    </ul>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
        </nav>
        <div class="navicon-right">
            <a id="btnRightMenu" href="" class="pos-relative">
                <i class="icon ion-ios-bell-outline"></i>
                <!-- start: if statement -->
                <span v-if="totalUnread > 0" class="square-8 bg-danger"></span>
                <!-- end: if statement -->
            </a>
        </div><!-- navicon-right -->
    </div><!-- sl-header-right -->
</div><!-- sl-header -->
