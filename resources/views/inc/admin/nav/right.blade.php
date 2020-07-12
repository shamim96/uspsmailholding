<div class="sl-sideright">
    <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" role="tab" href="#notifications">Notifications <span v-if="total" v-text="total"></span></a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.markAllRead')}}">Mark all as read</a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.deleteAllAlert')}}">Delete All</a>
        </li>
    </ul><!-- sidebar-tabs -->

    <!-- Tab panes -->
    <div class="tab-content">


        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto active" id="notifications" role="tabpanel">
            <div class="media-list">
                <!-- loop starts here -->
                <span v-for="alert in alerts">
                <a v-bind:href="siteUrl+'/admin/notification/'+alert.id" class="media-list-link read">
                    <div class="media pd-x-20 pd-y-15">

                        <div class="media-body">
{{--                            <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>--}}
                             <p v-bind:style="color(alert.status)" class="tx-13 mg-b-0 tx-gray-700" v-text="alert.comment"></p>
                            <span class="tx-12"  v-text="alert.created_at"></span>
                        </div>
                    </div><!-- media -->
                </a>
                </span>
                <!-- loop ends here -->

            </div><!-- media-list -->
        </div><!-- #notifications -->

    </div><!-- tab-content -->
</div><!-- sl-sideright -->
