@extends('frontend.layout.header')
@section('content')
   <!-- ======= contact banner Section ======= -->
  <section id="contact" style='background-image: url("{{asset('/frontend/hero/contact.png')}}");' alt="contact-bhargavaauction" title="contact us">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- Content Block -->
          <div class="block">
            <div class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
              <div class="wrap-contact100">
                <h4>How may I help you?</h4>
                <form class="contact100-form validate-form flex-sb flex-w" method="post" action="{{route('store-contact-us')}}">
                  @csrf
                  <div class="wrap-input100 rs1 validate-input" data-validate = "Name is required">
                    <input class="input100" type="text" name="name" placeholder="Your Name" value="{{old('name')}}">
                    <span class="focus-input100"></span>
                    <small class="form-text text-danger">{!!$errors->first('name')!!}</small>
                  </div>
                  <div class="wrap-input100 rs1 validate-input" data-validate = "Email is required: e@a.z">
                    <input class="input100" type="email" name="mail" placeholder="Your Email" value="{{old('mail')}}">
                    <span class="focus-input100"></span>
                    <small class="form-text text-danger">{!!$errors->first('mail')!!}</small>
                  </div>
                  <div class="wrap-input100 validate-input" data-validate = "Message is required">
                    <textarea class="input100" name="message" placeholder="Your Message">{{old('message')}}</textarea>
                    <span class="focus-input100"></span>
                    <small class="form-text text-danger">{!!$errors->first('message')!!}</small>
                  </div>
                  <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn">
                      Submit your query
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection