@extends('frontend.layout.header')
<style>
	
/*.height-100 {
    height: 100vh
}*/

.card {
    width: auto;
    border: none;
    /*height: 300px;*/
    box-shadow: 0px 5px 20px 0px #6F1667;
    z-index: 1;
    display: flex;
    justify-content: center;
    align-items: center
}

.card h6 {
    color: #6F1667;
    font-size: 20px
}

.inputs input {
    width: 10%;
    height: 100%;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0
}

.form-control:focus {
    box-shadow: none;
    border: 2px solid #6F1667
}

.validate {
    border-radius: 20px;
    height: 40px;
    background-color: #6F1667;
    border: 1px solid #6F1667;
    width: 40%
}

.content a {
    color: #D64F4F;
    transition: all 0.5s
}
</style>
@section('content')
{{-- <section id='user_dashboard' class="banner bg-banner-one overlay" style='background-image: url("{{asset('/frontend/hero/registration.png')}}");'> --}}
<section id='user_dashboard' class="banner bg-banner-one overlay">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <div class="col-lg-12">
        <!-- Content Block -->
        <div class="block">
        </div>
      </div>
    </div>
  </div>
</section>
<section id="" class="user_dashboard">
  {{-- <div class="container">
    <div class="row">
      <div class="col-lg-6 ml-auto mr-auto mb-5">
            
				<div class="bg-white shadow-sm rounded">
	        <div class="p-3 border-bottom bold">
	          Mobile Number Verification
	        </div>
	        <div class="p-3">
	        	<p>Please Enter The OTP Send To <b><i>{{Auth()->user()->mobile_1}}</i></b>. Thanks!</p>

						<form action="" method="post">
							@csrf
							<div class="form-group row">
		            <div class="ml-auto mr-auto col-md-6">
		              <input type="text" name="otp" min="4" max="4">
		            </div>
		          </div>
							<div class="form-group row">
		            <div class="ml-auto mr-auto col-md-6">
		              <button type="submit" class="btn btn-danger request-btn">Verify Number</button>
		            </div>
		          </div>
						    
						</form>
	        </div>
				</div>
			</div>
		</div>
	</div> --}}
	<div id="app">
    <div class="container height-100 d-flex justify-content-center align-items-center">
        <div class="position-relative row">
            <div class="card p-2 text-center col-lg-6 ml-auto mr-auto mb-5">
                <h6>Please enter the one time password {{$otp = session()->get('OTP');}} <br> </h6>
                <div> <span> sent to</span> <small>+91******{{substr(auth()->user()->mobile_1, -4) }}</small> </div>
                <form action="{{-- {{route('otp-verify')}} --}} javascript:void(0)" method="post">
                	@csrf
                	<div id="otp" class="inputs d-flex flex-row justify-content-center mt-2"> 
                		<input class="m-2 text-center form-control rounded" type="text" id="input1" v-on:keyup="inputenter(1)" maxlength="1" name="otp_1" /> 
                		<input class="m-2 text-center form-control rounded" v-on:keyup="inputenter(2)" type="text" id="input2" maxlength="1" name="otp_2" /> 
                		<input class="m-2 text-center form-control rounded" v-on:keyup="inputenter(3)" type="text" id="input3" maxlength="1" name="otp_3" /> 
                		<input class="m-2 text-center form-control rounded" v-on:keyup="inputenter(4)" type="text" id="input4" maxlength="1" name="otp_4" /> 
                	</div>
                    
                   
                    <small class="form-text text-danger" style="display: none;" id="error"></small>
                    
                	<div class="mt-4"> 
                        <button class="btn btn-danger px-4 validate" onClick="validate_otp()">Validate</button>
                    </div>
                </form>
                
                {{-- <div class="mt-3 content d-flex justify-content-center align-items-center"> <span>Didn't get the code</span> <a href="#" class="text-decoration-none ms-3">Resend(1/3)</a> </div> --}}
            </div>
        </div>
    </div>
</div>
</section>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
<script>
var app = new Vue({
    el: '#app',
    methods: {
        inputenter(id) {

            const inputs = document.querySelectorAll('#otp > *[id]');
            for (let i = 0; i < inputs.length; i++) { 
                inputs[i].addEventListener('keydown', function(event) { 
                    if (event.key==="Backspace" ) { 
                        inputs[i].value='' ;
                        if (i !==0) inputs[i - 1].focus(); 
                    } else { 
                        if (i===inputs.length - 1 && inputs[i].value !=='' ) { 
                            return true; 
                        } else if (event.keyCode> 47 && event.keyCode < 58) { 
                            inputs[i].value=event.key; 
                            if (i !==inputs.length - 1) inputs[i + 1].focus(); 
                            event.preventDefault(); 
                        } else if (event.keyCode> 64 && event.keyCode < 91) { 
                            inputs[i].value=String.fromCharCode(event.keyCode); 
                            if (i !==inputs.length - 1) inputs[i + 1].focus(); 
                            event.preventDefault(); 
                        } 
                    } 
                }); 
            } 
        }
    }
});
</script>
<script>
function validate_otp() {
    if($('#input1').val() =='' || $('#input2').val() =='' || $('#input3').val() =='' || $('#input4').val()  =='')
    {
        $('#error').show();
        $('#error').html('<b><i>All fields are required</i></b>');
    }else{
        $('#error').hide();
        var otp=$('#input1').val()+$('#input2').val()+$('#input3').val()+$('#input4').val();

        $.ajaxSetup({
          beforeSend: function(xhr, type) {
              if (!type.crossDomain) {
                  xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
              }
          },
        });
        $.ajax({
          url: "{{route('otp-verify')}}",
          type: "POST",
          data: {
              otp:otp,
              _token: '{{csrf_token()}}'
          },
          dataType: 'json',
          success: function (res) {
            
             if (res.error) {
                $('#error').show();
                $('#error').html('<b><i>'+res.error+'</i></b>');
             }else if(res.success){
                $('#error').removeClass('text-danger');
                $('#error').addClass('text-success');
                $('#error').fadeIn();
                $('#error').html('<b><i>'+res.success+'</i></b>');
                window.location.href = res.url;
             } 
          }
        });
    }  
}
</script>
@endsection