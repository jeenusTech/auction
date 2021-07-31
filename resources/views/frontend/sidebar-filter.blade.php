
  <!-- ======= Filter category Section ======= -->
        <div class="col-lg-3">
        <form class="" id="search-form" action="" method="GET">
          <div class="">
            <div class="text-left">
              <div class="bg-white shadow-sm rounded mb-3">
                <div class="p-3 border-bottom bold">
                  Search Keyword
                </div>
                <div class="p-3">
                 <div class="form-group row filter-search">
                  <div class="col-sm-9">
                    <input type="search" class="form-control inp" id="inputEmail" placeholder="Type Keywords....">
                    <i class="fa fa-search"></i>
                  </div>
                </div>
                </div>
              </div>
              @php
                $categories = App\Models\category::all();
              @endphp
              <div class="bg-white shadow-sm rounded mb-3">
                <div class="p-3 border-bottom bold">
                  Auction Categories
                </div>
                <div class="p-3">
                  <ul class="list-unstyled">
                    @foreach($categories as $category)
                      <li class="mb-2 ml-2">
                        @php
                        $count=0;
                        @endphp
                        @foreach($category->lots as $lot)
                          @php ($count=($count)+($lot->count()))
                        @endforeach
                        <a class="text-reset fs-14" href="javascript:void(0)">{{$category->cat_name}} <label class="float-right filt-lbl">({{$count}})</label></a>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>     
            </div>
          </div>
        </form>
        </div>
        <div class="col-lg-1">
        </div>