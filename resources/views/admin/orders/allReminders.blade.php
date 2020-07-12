@extends('layouts.admin')
@section('content')
    @include('inc.toast')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div id="renewal" class="card pd-20 pd-sm-40 mg-t-10 col-lg-6 col-sm-8 d-block m-auto">

                <h4 class="text-center">Hold mail from <span class="text-primary">{{$order->startDate}}</span> to <span class="text-primary">{{$order->endDate}}</span></h4>
                <h4 class="text-center">All renewal reminders</h4>
                <hr/>
                        @include('inc.loading',['loadingId'=>'1'])
                        <h3 v-if="!loading1" class="text-center" v-for="(date, index) in dates">
                            <span v-text="(index+1)+'.'" class=""></span>
                            <span  v-text="date.date"></span>
                            <button @click="onDeleteRenewalDate(date.id)" class="ml-4 cursorPointer"><span class="fa fa-trash text-danger"></span></button>
                        </h3>


                <div class="col-sm-12 mt-5 text-center">
                    <h6>Add a new renewal date</h6>
                    <input v-model="newDate" type="date" class="form-control" />
                    <button @click="onSubmitHoldMail" v-if="!loading" class="cursorPointer btn btn-success btn-lg mt-2">Save</button>

                    @include('inc.loading')
                </div>
            </div>
        </div>
    </div>



@endsection

@section('footer')
    <script type="text/javascript">


        var app = new Vue({
            el : '#renewal',

            data: {
                siteUrl,
                loading : false,
                loading1: false,
                emailValid : false,
                dates: {},
                newDate: "",
                orderId : "<?php echo $orderId; ?>",



            },
            methods : {
                onSubmitHoldMail(){
                    this.loading = true;
                    if(!this.newDate){
                        toastError("Date field required!")
                        this.loading = false;
                    }else{
                        axios.post(siteUrl+"/admin/axios/set-new-renewal-date-for-order/"+this.orderId,{newDate : this.newDate, orderId: this.orderId}).then(res=>{
                            toastSuccess('New renewal reminder date saved!')
                            this.loading = false;
                            this.newDate = "";
                            this.setAllRenewalDates();
                        }).catch(err=>{
                            this.loading = false;
                            toastError("Something went wrong! Try again.")
                        })
                    }
                },

                onDeleteRenewalDate(id){
                    if(confirm("Do you want to delete this date?")){
                        axios.get(siteUrl+"/admin/axios/delete-new-renewal-date-for-order/"+id).then(res=>{
                            toastInfo('Renewal date date deleted')
                            this.setAllRenewalDates();
                        }).catch(err=>toastError("Something went wrong! Try again."))
                    }
                },

                setAllRenewalDates(){
                    this.loading1 = true;
                    axios.get(siteUrl+"/admin/axios/all-order-renewal-dates/"+this.orderId).then(res=>{this.dates = res.data; this.loading1 = false})
                }
            },


            created(){
                this.setAllRenewalDates();
            }


        })
    </script>
    @endsection
