<script src="{{asset('public')}}/admin/lib/jquery/jquery.js"></script>
<script src="{{asset('public')}}/admin/js/popper.min.js"></script>
<script src="{{asset('public')}}/admin/lib/bootstrap/bootstrap.js"></script>
<script src="{{asset('public')}}/admin/lib/jquery-ui/jquery-ui.js"></script>
<script src="{{asset('public')}}/admin/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="{{asset('public')}}/admin/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
<script src="{{asset('public')}}/admin/lib/d3/d3.js"></script>
<script src="{{asset('public')}}/admin/lib/chart.js/Chart.js"></script>
<script src="{{asset('public')}}/admin/lib/Flot/jquery.flot.js"></script>
<script src="{{asset('public')}}/admin/lib/Flot/jquery.flot.pie.js"></script>
<script src="{{asset('public')}}/admin/lib/Flot/jquery.flot.resize.js"></script>
<script src="{{asset('public')}}/admin/lib/flot-spline/jquery.flot.spline.js"></script>

<script src="{{asset('public')}}/admin/js/starlight.js"></script>
<script src="{{asset('public')}}/admin/js/ResizeSensor.js"></script>

@yield('footer')
<script type="text/javascript">

    let allAlertsLink = "<?php echo route('admin.allAlerts'); ?>"
    console.log(allAlertsLink)
    var app = new Vue({
       el : "#vueNav",
        data: {
           alerts : {},
            total : false,
            totalUnread : 0,
            siteUrl,

            allOrderStatus: {},

        },

        methods : {
          color(status){
              if(status == 1){
                  return {
                      "color" : "#428d71",
                      "font-weight" : "bold"
                  }
              }
              return "";
          }
        },

        created(){
           axios.get(allAlertsLink).then(res=>{
                this.alerts = res.data;
                this.total = "(" +this.alerts.length + ")";
                if(this.alerts.length > 0){
                    let unread = this.alerts.filter(data => {
                        return data.status == 1;
                    })
                    this.totalUnread = unread.length
                }
            });

            axios.get(siteUrl+"/admin/axios/all-order-statuses").then(res=>{
                this.allOrderStatus = res.data;
                console.log(this.allOrderStatus)
            }).catch(err =>{

            })
        }
    });
</script>
</body>
</html>
