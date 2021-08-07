@extends('frontend.layout.header')
@section('content')
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
  <!-- End Hero -->
  <!-- ======= Hero Section ======= -->
  <section id="form-section">
    <div class="container">
      {{-- <div class="row">
        <div class="col-md-12">
          <div class="container bank-container">
           
          </div>
        </div>
      </div> --}}
       <div class="row">
              <div class="col-md-12">
                <div class="container latest-auction-container">
                  <div class="row">
                    <div class="container latest_auc_title">
                      <div class="row">
                        <div class="col-md-12">
                          <h6>Our Bank Detail</h6>
                          {{-- <label class="auc_title_label">Sunday 9th May 2021 10:30 Am Onwards</label> --}}
                          
                          <label class="auc_title_label">
                            <ul class="nav nav-tabs nav-tabs-neutral" role="tablist">
                              @php
                              $i=0;
                              @endphp
                              @foreach($banks as $bank)
                              <li class="nav-item">
                                <a class="nav-link text-warning {{$i==0?'active':''}}" data-toggle="tab" href="#bank_{{$bank->id}}" role="tab">{{$bank->name}}</a>
                              </li>
                              @php
                              $i++;
                              @endphp
                              @endforeach
                            </ul>
                          </label>
                        </div>
                      </div>
                    </div>

                    
                    {{-- bid description section starts here --}}
                    {{-- <div class="col-sm-12 col-md-12 "> --}}
                      
                      <section class="bg-white-border bank-right">
                        <div class="tab-content">
                          @php
                          $j=0;
                          @endphp
                          @foreach($banks as $bank)
                          <div class="tab-pane {{$j==0 ?'active':''}}" id="bank_{{$bank->id}}" role="tabpanel">

                            <p style="height: 85px">
                              <img src="{{getimg($bank->bank_logo)}}" height="100%" alt="{{$bank->name}} Logo" title="{{$bank->name}}" data-original-title="{{$bank->name}} Bank">
                            </p>
                            <div class="row">
                                <div class="col-sm-12 col-md-9 summernote_cont">
                                  {!!$bank->bank_info!!}
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <img src="{{getimg($bank->qr_code)}}" alt="{{$bank->name}} qr" title="{{$bank->name}} qr-code" class="qr-upi">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 summernote_cont">
                                  {!!$bank->bank_description!!}
                                </div>
                            </div>
                            
                          </div>
                          @php
                          $j++;
                          @endphp
                          @endforeach
                        </div>
                    </section>
                   {{--  </div> --}}
                    {{-- bid description section ends here --}}
                  </div>
                </div>
              </div>
           
            </div>
    </div>
  </section>
  <!-- End Hero -->
@endsection
