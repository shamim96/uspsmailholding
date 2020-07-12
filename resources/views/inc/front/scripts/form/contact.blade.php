
<script>


    var app = new Vue({
        el : '#app',

        data: {
            submitFirstTime : false,
            formError : true,
            siteUrl,
            loading : false,
            emailValid : false,
            success : false,
            formData : {
                name: "",
                email: "",
                phone: "",
                subject: "",
                message: "",

            },


        },
        methods : {
            validEmail (event) {
                let re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                this.emailValid = re.test(event.target.value);
            },

            onSubmitHoldMail(){
                this.loading = true;
                this.success = false;
                if(!this.formData.name || this.formData.phone.length < 12 || !this.emailValid || !this.formData.subject || !this.formData.message){
                    this.formError = true;
                    this.submitFirstTime = true;
                    this.loading = false;
                }else{
                    axios.post(this.siteUrl+"/contact-us-post",{
                        name : this.formData.name,
                        email : this.formData.email,
                        phone : this.formData.phone,
                        subject : this.formData.subject,
                        message : this.formData.message,
                    }).then(res=>{
                        this.submitFirstTime = false
                        this.formData.name = "";
                        this.formData.email = "";
                        this.formData.subject = "";
                        this.formData.message = "";
                        this.formData.phone = "";
                        this.formError = false;
                        this.loading = false;
                        this.success = true;
                    }).catch(err => {this.loading = false; this.formError = true;})

                }

            },

            acceptNumber() {
                var x = this.formData.phone.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
                this.formData.phone = !x[2] ? x[1] : '' + x[1] + '-' + x[2] + (x[3] ? '-' + x[3] : '');
            }
        },


    })
</script>
