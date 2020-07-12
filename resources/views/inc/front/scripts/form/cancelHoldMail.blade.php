<?php
use Carbon\Carbon;
$estTime = (new DateTime('America/New_York'))->format('H');
$date = date('Y, m-1, d');
$date1 = Carbon::createFromFormat("Y-m-d",$order->startDate);
$date2 = Carbon::createFromFormat("Y-m-d",$order->endDate);
$date1 = $date1->year.", ". ($date1->month -1) . ", " . $date1->day;
$date2 = $date2->year.", ". ($date2->month -1) . ", " . $date2->day;


?>

<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/vuejs-datepicker"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
<script>
    var date1 = new Date(<?php echo $date1; ?>);
    var date2 = new Date(<?php echo $date2; ?>);
    var estTime ="<?php echo $estTime ?>";
    var tomorrow = new Date(<?php echo $date; ?>);
    tomorrow.setDate(tomorrow.getDate() + 1);
    if(estTime > 14){
        tomorrow.setDate(tomorrow.getDate() + 1);
    }
    var disableRestDays = new Date(tomorrow);
    disableRestDays.setDate(disableRestDays.getDate() + 30);

    var app = new Vue({
        el : '#app',
        components: {
            vuejsDatepicker
        },
        datePlaceHolder : "YY/MM/DD",
        data: {
            fromDate: {
                disabledDates: {
                    days: [0],
                    to: tomorrow,
                    from: disableRestDays
                },
            },
            toDate: {
                disabledDates: {
                     days: [0],
                    to: tomorrow,
                    from: disableRestDays
                },
            },
            siteUrl,
            submitFirstTime : false,
            startDateUpdatePossible : "<?php echo $startDateUpdatePossible; ?>",
            endDateUpdatePossible : "<?php echo $endDateUpdatePossible; ?>",
            error : false,
            startDate: "<?php echo $order->startDate; ?>",
            endDate: "<?php echo $order->endDate; ?>",
            additionalInformation: "<?php echo str_replace(array("\n", "\r"), ' ', $order->additionalInformation); ?>",
            updated : false,
            loading : false,
            formData : {
                startDate: "",
                endDate: "",
                startDate2: date1,
                endDate2: date2,
                additionalInformation: "<?php echo str_replace(array("\n", "\r"), ' ', $order->additionalInformation); ?>",

            },
        },
        methods : {

            selectFromDate(date){
                let hidden =  new Date(date)
                let disableFromDate = new Date(date);
                disableFromDate.setDate(disableFromDate.getDate() + 365)
                this.formData.endDate2 = "";
                 hidden.setDate(hidden.getDate() + 3);
                this.toDate.disabledDates.to = hidden;
                this.toDate.disabledDates.from = disableFromDate;
            },

            onSubmitHoldMail(){
                this.loading = true;
                if(!this.formData.startDate2 || !this.formData.endDate2){
                    this.submitFirstTime = true;
                    this.loading = false;
                }else{
                    this.convertDates();
                    axios.post(this.siteUrl+"/update-hold-mail",{
                        startDate : this.formData.startDate,
                        endDate : this.formData.endDate,
                        additionalInformation : this.formData.additionalInformation,
                        userEmail : "<?php echo $order->email; ?>",
                        userOrderId : "<?php echo $order->id; ?>"
                    }).then(res=>{
                        console.log(res.data)
                        this.error = false;
                        this.submitFirstTime = true;
                        if(res.data == "1"){
                            this.startDate = this.formData.startDate;
                                this.endDate = this.formData.endDate;
                                this.additionalInformation = this.formData.additionalInformation;
                                this.updated = true;
                            this.loading = false;
                        }else{
                            this.error = true;
                            ths.updated = false;
                            this.loading = false;
                        }
                    }).catch(error=> {
                        this.error = true;
                        this.loading = false;
                    })
                }

            },


            convertDates(){
                let startDate = this.formData.startDate2;
                let endDate = this.formData.endDate2;
                startDate = startDate.getFullYear()+"-"+ (startDate.getMonth()+1)+"-"+startDate.getDate();
                endDate = endDate.getFullYear()+"-"+ (endDate.getMonth()+1)+"-"+endDate.getDate();
                this.formData.startDate = startDate;
                this.formData.endDate = endDate;
            }

        },
        created(){
           let hidden = date1;
           let hidden2 = new Date(date1);
            hidden =  new Date(hidden)
            hidden.setDate(hidden.getDate() + 3);
            this.toDate.disabledDates.to = hidden;
            hidden2.setDate(hidden2.getDate() + 365);
            this.toDate.disabledDates.from = hidden2;

        }

    })
</script>
