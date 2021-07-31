@extends('frontend.layout.header')
@section('content')
   <!-- ======= contact banner Section ======= -->
  <section id="contact" style='background-image: url("{{asset('/frontend/hero/contact.png')}}");'>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- Content Block -->
          <div class="block">
            <div class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
              <div class="wrap-contact100">
                <h4>Verify Your Identity</h4>
                <form class="contact100-form validate-form flex-sb flex-w" method="POST" action="{{-- {{ route('login') }} --}}">
                  @csrf
                  <div class="wrap-input100 rs1 validate-input">
                    <input class="input100 @error('email') is-invalid @enderror" type="email" id="email" name="email" placeholder="User Name" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <span class="focus-input100"></span>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="wrap-input100 rs1 validate-input">
                    <input class="input100 @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="Your Password" required autocomplete="current-password">
                    <span class="focus-input100"></span>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <div class="custom-checkbox custom-control">
                      <div class="input-group">
                        <div class="custom-checkbox custom-control col-6">
                          <input type="checkbox"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="custom-control-input">
                          <label for="remember" class="custom-control-label">Remeber Me</label>
                        </div>
                        <label for="forgot-password" class="col-6">
                          @if (Route::has('password.request'))
                              <a class="ml-6" href="{{ route('password.request') }}">
                                  {{ __('Forgot Password?') }}
                              </a>
                          @endif
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn">
                     Login
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