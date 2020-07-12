<span id="app">
<form v-on:submit.prevent="onSubmitHoldMail">
    {!! csrf_field() !!}
    <input type="hidden" name="captchaToken" id="captchaToken" value="" />
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Name</label>
            <input name="name" v-model="formData.name" class="form-control">
             <span v-if="submitFirstTime && !formData.name" class="text-danger">name required</span>
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Email</label>
            <input @change="validEmail" type="text" v-model="formData.email" class="form-control">
             <span v-if="submitFirstTime && !emailValid" class="text-danger">Valid email required</span>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputPassword4">Phone Number</label>
            <input @input="acceptNumber"  type="text"  v-model="formData.phone"  class="form-control">
            <span v-if="submitFirstTime && formData.phone.length < 12" class="text-danger">Valid phone number required</span>
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Subject</label>
            <input type="text" v-model="formData.subject" class="form-control">
             <span v-if="submitFirstTime && !formData.subject" class="text-danger">subject required</span>
        </div>
    </div>


 <div class="form-group">
     <label for="inputEmail4">Your Message</label>
     <textarea type="text" v-model="formData.message" class="form-control" rows="6"></textarea>
     <span v-if="submitFirstTime && !formData.message" class="text-danger">message required</span>
 </div>

    @include('inc.loading')
    <button v-if="!loading" type="submit" class="btn btn-info btn-lg d-block m-auto">Submit</button>
    <span class="d-block p-2 alert-danger text-danger text-center mt-3" v-if="submitFirstTime && formError">Something went wrong!</span>
    <span class="d-block p-2 alert-success text-success text-center mt-3" v-if="success">Thank you for your message. We will get back to you soon.</span>
</form>

</span>

@include('inc.front.scripts.form.contact')


