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
                          <h6>Our Terms And Conditions</h6>
                          {{-- <label class="auc_title_label">Sunday 9th May 2021 10:30 Am Onwards</label> --}}
                          
                          <label class="auc_title_label">
                            
                          </label>
                        </div>
                      </div>
                    </div>

                    
                    {{-- bid description section starts here --}}
                    {{-- <div class="col-sm-12 col-md-12 "> --}}
                      
                      <section class="bg-white-border bank-right">
                        <div class="tab-content">
                          @if($terms !=null)
                          {!!$terms->detail!!}
                          @endif
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
