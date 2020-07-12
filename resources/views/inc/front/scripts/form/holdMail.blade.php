<?php
$estTime = (new DateTime('America/New_York'))->format('H');
$date = date('Y, m-1, d');
?>

<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/vuejs-datepicker"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
<script>
    var estTime ="<?php echo $estTime ?>";
    var tomorrow = new Date(<?php echo $date; ?>);
    tomorrow.setDate(tomorrow.getDate() + 1);
    if(estTime > 14){
        tomorrow.setDate(tomorrow.getDate() + 1);
    }
    var disableRestDays = new Date(tomorrow);
    disableRestDays.setDate(disableRestDays.getDate() + 30)

    var app = new Vue({
        el : '#app',
        components: {
            vuejsDatepicker
        },
        datePlaceHolder : "YY/MM/DD",
        data: {
            value: '',
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
                    from : disableRestDays
                },
            },
            divClass : "form-group col-sm-6",
            submitFirstTime : false,
            formError : true,
            holdMailForm : true,
            paymentForm : false,
            siteUrl,
            loading : false,
            addressApi: "",
            formData : {
                startDate: "",
                endDate: "",
                startDate2: "",
                endDate2: "",
                businessAddress: false,
                firstName: '',
                lastName: '',
                company: '',
                phone: '',
                email: '',
                street : '',
                apt: '',
                city: '',
                state: '',
                zip: '',
                receiveMail : "1",
                additionalInformation: '',
            },

            emailValid : false,
            addressError : false,
            terms : false

        },
        methods : {
            selectAddressType(){
                if(this.formData.businessAddress){
                    this.divClass = "form-group col-sm-6"
                }else{
                    this.divClass = "form-group col-sm-4"
                }
            },
            selectFromDate(date){
                let disableFromDate = new Date(date);
                    disableFromDate.setDate(disableFromDate.getDate() + 365)
                let hidden =  new Date(date)
                this.formData.endDate2 = "";
                 hidden.setDate(hidden.getDate() + 3);
                this.toDate.disabledDates.to = hidden;
                this.toDate.disabledDates.from = disableFromDate;
            },
            validEmail (event) {
                let re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                this.emailValid = re.test(event.target.value);
            },

            onSubmitHoldMail(){
                this.addressError = false
                this.holdMailForm = false;
                this.loading = true;
                if(!this.formData.firstName || !this.formData.lastName || this.formData.phone.length < 12 || !this.emailValid || !this.formData.street || !this.formData.city || !this.formData.state || !this.formData.zip || !this.formData.startDate2 || !this.formData.endDate2 || !this.formData.receiveMail || !this.terms){
                  this.wrongSubmission()
                }else{
                    this.addressValidate();
                    setTimeout(()=>{
                       if(!this.addressError){
                           this.convertDates();
                           axios.post(this.siteUrl+"/set-temp-data",{
                               data : this.formData
                           }).then(res=>{
                               axios.post(this.siteUrl+"/create-checkout-id",{
                                   email : this.formData.email
                               }).then(res=>{
                                   let checkoutId = res.data;
                                   let externalScript = document.createElement('script')
                                   externalScript.setAttribute('src', 'https://oppwa.com/v1/paymentWidgets.js?checkoutId='+checkoutId);
                                   document.head.appendChild(externalScript);
                                   this.formError = false;
                                   this.holdMailForm = false;
                                   this.paymentForm = true;
                                   this.submitFirstTime = true;
                                   this.loading = false
                               }).catch(err => {this.loading = false; this.holdMailForm = true;})
                           }).catch(err => { this.loading = false; this.holdMailForm = true;})
                       }else{
                           this.wrongSubmission();
                       }
                    },2000);



                }

            },



            convertDates(){
                let startDate = this.formData.startDate2;
                let endDate = this.formData.endDate2;
                startDate = startDate.getFullYear()+"-"+ (startDate.getMonth()+1)+"-"+startDate.getDate();
                endDate = endDate.getFullYear()+"-"+ (endDate.getMonth()+1)+"-"+endDate.getDate();
                this.formData.startDate = startDate;
                this.formData.endDate = endDate;
            },

            acceptNumber() {
                var x = this.formData.phone.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
                this.formData.phone = !x[2] ? x[1] : '' + x[1] + '-' + x[2] + (x[3] ? '-' + x[3] : '');
            },


            addressValidate(){
                let street = this.formData.street.replace(/ /g, "+");
                let state = this.formData.state;
                let city = this.formData.city;
                let zipcode = this.formData.zip;

                axios.get(siteUrl+'/get-current-address-validation-api').then(res=>{
                    if(res.data && res.data != ""){
                        this.addressApi = res.data;
                    }else{
                        this.addressApi = "";
                    }
                }).then(res=>{
                    if(this.addressApi){
                        axios.get(`https://trial.serviceobjects.com/av3/api.svc/GetBestMatchesJson?BusinessName=&Address=${street}&Address2=&City=${city}&State=${state}&PostalCode=${zipcode}&LicenseKey=${this.addressApi}`).then(res => {
                            let status = res.data.IsCASS ;
                            if (status != true){
                                this.addressError = res.data.Error.Desc;
                            }else{
                                this.addressError = false;
                            }
                        }).catch(err => this.addressError = false);
                    }
                });


            },

            wrongSubmission(){
                this.formError = true;
                this.holdMailForm = true;
                this.paymentForm = false;
                this.submitFirstTime = true;
                this.loading = false;
                this.holdMailForm = true;
            }

        },

        created(){

        }


    })
</script>
