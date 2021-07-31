@extends('frontend.user_dashboard.layout.dashboard_nav')
@section('user_content')
<div class="container">
	<div class="row">
		<div class="col-md-6 mb-3">
			<div class="bg-white shadow-sm rounded">
		        <div class="p-3 border-bottom bold">
		          CONTACT DETAILS<a class="ud_chang_pass_link" href="{{route('change-contact')}}"><i class="fa fa-edit pr-3"></i>Edit</a>
		        </div>
		        <div class="p-3">
		        	<label for="address"><b>Address:</b></label>
		        	<p>
	        		{{auth()->user()->address_1}},{{auth()->user()->address_2}}<br>
	        		{{getCity(auth()->user()->city)->name}}-{{auth()->user()->pincode}}<br>
	        		{{getState(auth()->user()->state)->name.', '.getCountry(auth()->user()->country)->name}}.
		        		
		        	</p>
		        	<label for="address"><b>Phone number:</b></label>
		        	<p>{{auth()->user()->mobile_1}}/{{auth()->user()->mobile_2}}</p>
		        	<label for="address"><b>Email:</b></label>
		        	@if(auth()->user()->email_verified_at == null)
                    	<a class="text-reset fs-14 verify_btn" href="{{route('verification.notice')}}">verify</a>
                    @else
                    	<i class="fa fa-check-circle text-success"></i>
                    @endif
		        	<p>{{auth()->user()->email}}</p>
		        </div>
			</div>
		</div>
		<div class="col-md-6 mb-3">
			<div class="bg-white shadow-sm rounded">
		        <div class="p-3 border-bottom bold ">
		          DOCUMENTS / REFERENCES
					<a class="ud_chang_pass_link" href="{{route('update-documents')}}"><i class="fa fa-edit pr-3"></i>Edit</a>
		        </div>
		        <div class="p-3">
		        	<label for="address"><b>Documents:</b></label>
		        	<p>PAN No. :{{auth()->user()->pan}}
		        		@if(auth()->user()->pan_verify != 0)
	                    	<i class="fa fa-check-circle text-success"></i>
	                    @endif 
	                    <br>
		        	AADHAAR No. :{{auth()->user()->aadhaar}}
		        		@if(auth()->user()->aadhaar_verify != 0)
	                    	<i class="fa fa-check-circle text-success"></i>
	                    @endif 
		        	<br>
		        	Passport No. :{{auth()->user()->passport}}
		        		@if(auth()->user()->passport_verify != 0)
	                    	<i class="fa fa-check-circle text-success"></i>
	                    @endif 
		        	</p>
		        	<label for="address"><b>References :</b></label>
		        	<p>
		        		{{auth()->user()->reference_name_1}}-{{auth()->user()->reference_number_1}}<br>
		        		{{auth()->user()->reference_name_1}}-{{auth()->user()->reference_number_1}}
		        	</p>
		        	<img src="{{getimg(auth()->user()->pan_file)}}" alt="pan-file" width="65px" height="45px" class="rounded" style="border: 1px solid;">
		        	<img src="{{getimg(auth()->user()->aadhaar_file_1)}}" alt="aadhar-file" width="65px" height="45px" class="rounded" style="border: 1px solid;">
		        	<img src="{{getimg(auth()->user()->aadhaar_file_2)}}" alt="aadhar-file" width="65px" height="45px" class="rounded" style="border: 1px solid;">
		        	<img src="{{getimg(auth()->user()->passport_file_1)}}" alt="aadhar-file" width="65px" height="45px" class="rounded" style="border: 1px solid;">
		        	<img src="{{getimg(auth()->user()->passport_file_2)}}" alt="aadhar-file" width="65px" height="45px" class="rounded" style="border: 1px solid;">
		        </div>
				
			</div>
		</div>
	</div>
</div>	
@endsection