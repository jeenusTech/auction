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
                <h4>Enter Your Detail</h4>
                <form class="contact100-form validate-form flex-sb flex-w" method="post" action="{{route('know-your-coin.store')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="wrap-input100 rs1 validate-input">
                        <input class="input100" type="text" name="name" placeholder="Your Name" value="{{old('name')}}">
                        <span class="focus-input100"></span>
                        <small class="form-text text-danger">{!!$errors->first('name')!!}</small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="wrap-input100 rs1 validate-input">
                        <input class="input100" type="text" name="last_name" placeholder="Your Last Name" value="{{old('last_name')}}">
                        <span class="focus-input100"></span>
                        <small class="form-text text-danger">{!!$errors->first('last_name')!!}</small>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="wrap-input100 rs1 validate-input">
                        <input class="input100" type="text" name="email" placeholder="Your Email" value="{{old('email')}}">
                        <span class="focus-input100"></span>
                        <small class="form-text text-danger">{!!$errors->first('email')!!}</small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="wrap-input100 rs1 validate-input">
                        <input class="input100" type="number" name="contact" placeholder="Your Contact" value="{{old('contact')}}">
                        <span class="focus-input100"></span>
                        <small class="form-text text-danger">{!!$errors->first('contact')!!}</small>
                      </div>
                    </div>
                  </div>

                  
                  <div class="wrap-input100 validate-input">
                    <textarea class="input100" name="address" placeholder="Your Address">{{old('address')}}</textarea>
                    <span class="focus-input100"></span>
                        <small class="form-text text-danger">{!!$errors->first('address')!!}</small>
                  </div>
                  <div class="wrap-input100 rs1 validate-input">
                    <input class="input100" type="file" name="image" placeholder="Your image">
                    <span class="focus-input100"></span>
                    <small class="form-text text-danger">{!!$errors->first('image')!!}</small>
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