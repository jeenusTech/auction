
  <!-- ======= Filter category Section ======= -->
        <div class="col-lg-3">
        <form class="" id="search-form" action="" method="GET">
          <div class="">
            <div class="text-left">
              @php
                $categories = App\Models\category::all();
              @endphp
              <div class="bg-white shadow-sm rounded mb-3">
                <div class="p-3 border-bottom bold">
                  Auction Categories
                </div>

                <div class="p-3">
                  <ul class="list-unstyled" id="sidebarfilt">
                    @if(site_navigation() == 'category-auction')
                      <li class="mb-2 ml-2 anc">
                        @if($category->lots->count()>0)
                          <a class="text-reset fs-14 " href="{{url('category-auctions/'.$category->id.'/lots')}}">{{$category->cat_name}} <label class="float-right filt-lbl">({{$category->lots->count()}})</label></a>
                        @endif
                      </li>
                    @elseif(site_navigation() == 'latest-auction')
                    
                      <li class="mb-2 ml-2 anc active">
                          <a class="text-reset fs-14 " href="javascript:void(0)">All<label class="float-right filt-lbl">({{$lots->count()}})</label></a>
                      </li>
                     
                      @foreach($categories as $category)
                      <li class="mb-2 ml-2 anc">
                        @php
                          $count=0;
                        @endphp
                       @foreach($lots as $lot)
                        @if($lot->category==$category->id)
                          @php
                          $count=($count)+($lot->singlecategory()->count());
                          @endphp
                        @endif
                       @endforeach
                       @if($count>0)
                        <a class="text-reset fs-14 " href="{{url('latest-category-auctions/'.$category->id.'/'.$auction->id.'/lots')}}">{{$category->cat_name}} <label class="float-right filt-lbl">({{$count}})</label></a>
                        @endif
                      </li>
                    @endforeach
                    @else
                    <li class="mb-2 ml-2 anc active">
                        <a class="text-reset fs-14 " href="javascript:void(0)" onclick="filterSelection('all')">All<label class="float-right filt-lbl">({{$lots->count()}})</label></a>
                    </li>
                    @foreach($categories as $category)
                      <li class="mb-2 ml-2 anc">
                        @php
                        $count=0;
                        @endphp
                        @foreach($lots as $lot)
                        @if($lot->category==$category->id)
                          @php ($count=($count)+($lot->singlecategory()->count()))
                        @endif
                        @endforeach
                        @if($count>0)
                        <a class="text-reset fs-14 " onclick="filterSelection('{{$category->cat_name}}')" href="javascript:void(0)">{{$category->cat_name}} <label class="float-right filt-lbl">({{$count}})</label></a>
                        @endif
                      </li>
                    @endforeach
                    @endif
                  </ul>
                </div>
              </div>     
            </div>
          </div>
        </form>
        </div>
        <div class="col-lg-1">
        </div>