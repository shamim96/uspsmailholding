<style>
    .addressError{
        padding: 20px; border: solid red 1px; margin-bottom: 20px;
    }
</style>
<span id="app">

<form v-on:submit.prevent="onSubmitHoldMail" v-if="holdMailForm">

    {!! csrf_field() !!}
    <div class="form-row mb-3">
    <input @click="selectAddressType" v-model="formData.businessAddress" type="checkbox" style="height: 30px" class="mr-2" />This is a business address
    </div>
    <h3>Contact</h3>
    <div class="form-row">
        <div class="form-group col-sm-6">
            <label>First Name*</label>
            <input type="text" v-model="formData.firstName" class="form-control">
            <span v-if="submitFirstTime && !formData.firstName" class="text-danger">This field required</span>
        </div>
        <div class="form-group col-sm-6">
            <label>
                Last Name*</label>
            <input type="text" v-model="formData.lastName" class="form-control">
            <span v-if="submitFirstTime && !formData.lastName" class="text-danger">This field required</span>
        </div>
    </div>
    <div class="form-row">
        <div v-if="formData.businessAddress" v-bind:class="divClass">
            <label>Company Name</label>
            <input type="text" v-model="formData.company" class="form-control">
        </div>
        <div v-bind:class="divClass">
            <label>Phone*</label>
            <input @input="acceptNumber"  type="text"  v-model="formData.phone" class="form-control">

            <span v-if="submitFirstTime && formData.phone.length < 12" class="text-danger">Valid phone number required</span>

        </div>
        <div v-bind:class="divClass">
            <label>Email*</label>
            <input @change="validEmail" type="text" v-model="formData.email" class="form-control">
             <span v-if="submitFirstTime && !emailValid" class="text-danger">Valid email required</span>
        </div>
    </div>

<hr/>
<h3>HoldMail Information</h3>
    <div v-bind:class="addressError?'addressError':''">
     <div class="form-row">
        <div class="form-group col-sm-6">
            <label>Street Address*</label>
            <input type="text" v-model="formData.street" class="form-control">
            <span v-if="submitFirstTime && !formData.street" class="text-danger">This field required</span>
        </div>
        <div class="form-group col-sm-6">
            <label>Apt/Suite</label>
            <input type="text" v-model="formData.apt" class="form-control">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-sm-4">
            <label for="inputEmail4">City*</label>
            <input type="text" v-model="formData.city" class="form-control">
             <span v-if="submitFirstTime && !formData.city" class="text-danger">This field required</span>
        </div>
        <div class="form-group col-sm-4">
            <label for="inputPassword4">State*</label>
            <select v-model="formData.state" class="form-control">
                <option selected value="">-select state-</option>
                @foreach($states as $state)
                    <option value="{{$state->STATE_NAME}}">{{$state->STATE_NAME}}</option>
                    @endforeach
            </select>
             <span v-if="submitFirstTime && !formData.state" class="text-danger">This field required</span>
        </div>
         <div class="form-group col-sm-4">
            <label for="inputPassword4">Zip*</label>
            <input type="text" v-model="formData.zip" class="form-control">
              <span v-if="submitFirstTime && !formData.zip" class="text-danger">This field required</span>
        </div>
<div v-if="addressError" class="col-sm-12 text-center">
    <h5 class="text-danger text-center" v-text="addressError"></h5>
</div>
    </div>
    </div>

    <div class="form-row">
        <div class="form-group col-sm-6">
            <label>Start Date*</label>
             <vuejs-datepicker  @selected="selectFromDate" :disabled-dates="fromDate.disabledDates"   placeholder="YY-MM-DD" v-model="formData.startDate2"></vuejs-datepicker>
            <span v-if="submitFirstTime && !formData.startDate2" class="text-danger">This field required</span>
        </div>
        <div class="form-group col-sm-6">
            <label>End Date*</label>
           <vuejs-datepicker v-if="formData.startDate2" v-model="formData.endDate2" :disabled-dates="toDate.disabledDates"   placeholder="YY-MM-DD"></vuejs-datepicker>
            <span class="text-info d-block" v-if="!formData.startDate2">Select start date first</span>
              <span v-if="submitFirstTime && !formData.endDate2" class="text-danger d-block">This field required</span>
        </div>
    </div>
    <div class="form-row">
         <label>How would you like to receive your mail after the end date?*</label>
        <div class="col-sm-12">
           <input value="1" v-model="formData.receiveMail" type="radio" name="receiveMail"> Carrier delivers accumulated mail
        </div>
        <div class="col-sm-12">
            <input value="2" v-model="formData.receiveMail" type="radio" name="receiveMail"> I will pick up accumulated mail
        </div>
        <div v-if="formData.receiveMail == 2" class="col-sm-12 text-info">
            If your mail is not picked up within 10 days, it will be returned to senders.
        </div>
        <div class="col-sm-12" v-if="submitFirstTime && !formData.receiveMail">
             <span  class="text-danger">This field required</span>
        </div>

    </div>
 <div class="form-group mt-3">
     <label for="inputEmail4">Additional Instructions?</label>
     <textarea v-model="formData.additionalInformation" class="form-control" rows="6"></textarea>
 </div>
<div class="form-group mt-3">
   <div class="col-sm-12">
        <input @click="selectAddressType" v-model="terms" type="checkbox" style="height: 17px" class="mr-2" /> I agree to the <a href="{{route('terms')}}">terms and condition</a>
   </div>
     <div class="col-sm-12" v-if="submitFirstTime && !terms">
             <span  class="text-danger">Please check this field and agree to our terms and codition before you submit this form</span>
        </div>
 </div>


    <button type="submit"  class="btn btn-info btn-lg d-block m-auto">Submit</button>
    <span class="text-danger d-block text-center alert-danger mt-3 p-2" v-if="submitFirstTime && formError">One or more fields are errors</span>
</form>



    <div v-if="loading" class="orbit-spinner d-block m-auto">
        <div class="orbit"></div>
        <div class="orbit"></div>
        <div class="orbit"></div>
     </div>
<span v-if="paymentForm === true" aos-init aos-animate data-aos="fade-up">
   <h3 class="d-block text-center"> Payment Information </h3>
    <p class="d-block text-center">Total: $14.95 – For identity and security purposes, please use a credit or debit card with the billing address that matches the hold address provided above. </p>
<form  action="{{route('front.page.thankYou')}}" class="paymentWidgets" data-brands="VISA MASTER AMEX"></form>
</span>
</span> <!-- #id = app -->

@include('inc.front.scripts.form.holdMail')



