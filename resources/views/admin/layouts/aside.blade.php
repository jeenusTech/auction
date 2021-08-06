
  <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary bg-navy elevation-4">
    <!-- Brand Logo -->
    <a href="/index" class="brand-link bg-navy">
      <img src="{{asset('/frontend/logo/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Auction</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('/frontend/logo/logo.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="javascript:void(0)" class="d-block">{{Auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>                
            </a>
          </li>
          <li class="nav-item {{(Request::is('admin/user_category*')) || (Request::is('admin/manageuser*')) || (Request::is('admin/pending-Users*')) || (Request::is('admin/blocked-Users*')) || (Request::is('admin/bid-request*')) ? 'menu-is-opening menu-open' : ''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Manage Users
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-warning right">{{(allPending_User() !=0?allPending_User(): 0) +(bid_plan_request() !=0?bid_plan_request(): 0)}}</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('user_category.index')}}" class="nav-link {{(Request::is('admin/user_category*')) ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('manageuser.index')}}" class="nav-link {{(Request::is('admin/manageuser*')) ? 'active' : ''}}">
                  <i class="fas fa-users nav-icon"></i>
                  <p>All Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('pending-Users')}}" class="nav-link {{(Request::is('admin/pending-Users*')) ? 'active' : ''}}">
                  <i class="far fa-clock nav-icon"></i>
                  <p>Pending Users</p>
                <span class="badge badge-warning right">{{allPending_User()}}</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('blocked-Users')}}" class="nav-link {{(Request::is('admin/blocked-Users*')) ? 'active' : ''}}">
                  <i class="fa fa-ban nav-icon"></i>
                  <p>Blocked Users</p>
                <span class="badge badge-info right">{{allBlocked_User()}}</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('bid-request')}}" class="nav-link {{(Request::is('admin/bid-request*')) ? 'active' : ''}}">
                  <i class="fa fa-ban nav-icon"></i>
                  <p>Bid Request</p>
                <span class="badge badge-warning right">{{bid_plan_request()}}</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{(Request::is('admin/category*')) ? 'menu-is-opening menu-open' : ''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('category.index')}}" class="nav-link {{(Request::is('admin/category')) ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('category.create')}}" class="nav-link {{(Request::is('admin/category/create')) ? 'active' : ''}}">
                  <i class="fa fa-pencil-alt nav-icon"></i>
                  <p>Create Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{(Request::is('admin/admin-auction*')) || (Request::is('admin/admin-latest-auction')) ? 'menu-is-opening menu-open' : ''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-gavel"></i>
              <p>
                Auction
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin-auction.index')}}" class="nav-link {{(Request::is('admin/admin-auction')) ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Auctions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin-latest-auction')}}" class="nav-link {{(Request::is('admin/admin-latest-auction')) ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Latest Auctions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin-auction.create')}}" class="nav-link {{(Request::is('admin/admin-auction/create')) ? 'active' : ''}}">
                  <i class="fa fa-pencil-alt nav-icon"></i>
                  <p>Create Auction</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{(Request::is('admin/admin_lot*')) ? 'menu-is-opening menu-open' : ''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-balance-scale "></i>
              <p>
                Lot
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin_lot.index')}}" class="nav-link {{(Request::is('admin/admin_lot')) ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Lots</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin_lot.create')}}" class="nav-link {{(Request::is('admin/admin_lot/create')) ? 'active' : ''}}">
                  <i class="fa fa-pencil-alt nav-icon"></i>
                  <p>Create Lot</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{(Request::is('admin/seller*')) ? 'menu-is-opening menu-open' : ''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Seller Info
                <i class="fas fa-angle-left right"></i>
              </p>
                <span class="badge badge-warning right">{{allPending_Seller() != '0' ?allPending_Seller():''}}</span>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('seller.index')}}" class="nav-link {{(Request::is('admin/seller')) ? 'active' : ''}}">
                  <i class="fas fa-users nav-icon"></i>
                  <p>All Sellers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('pending_seller')}}" class="nav-link {{(Request::is('admin/pending_seller')) ? 'active' : ''}}">
                  <i class="fas fa-clock nav-icon"></i>
                  <p>Pending Sellers</p>
                  <span class="badge badge-warning right">{{allPending_Seller()}}</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('blocked_seller')}}" class="nav-link {{(Request::is('admin/blocked_seller')) ? 'active' : ''}}">
                  <i class="fas fa-ban nav-icon"></i>
                  <p>Blocked Sellers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('seller.create')}}" class="nav-link {{(Request::is('admin/seller/create')) ? 'active' : ''}}">
                  <i class="fa fa-pencil-alt nav-icon"></i>
                  <p>Create Seller</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{(Request::is('admin/bank*')) ? 'menu-is-opening menu-open' : ''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-university"></i>
              <p>
                Bank Info
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('bank.index')}}" class="nav-link {{(Request::is('admin/bank')) ? 'active' : ''}}">
                  <i class="fas fa-users nav-icon"></i>
                  <p>All Banks</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('bank.create')}}" class="nav-link {{(Request::is('admin/bank/create')) ? 'active' : ''}}">
                  <i class="fa fa-pencil-alt nav-icon"></i>
                  <p>Add Bank</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{(Request::is('admin/homePage*')) ? 'menu-is-opening menu-open' : ''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-images"></i>
              <p>
                HomePage Info
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('homePage.index')}}" class="nav-link {{(Request::is('admin/homePage')) ? 'active' : ''}}">
                  <i class="fas fa-images nav-icon"></i>
                  <p>All Banners</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('homePage.create')}}" class="nav-link {{(Request::is('admin/homePage/create')) ? 'active' : ''}}">
                  <i class="fa fa-pencil-alt nav-icon"></i>
                  <p>Add homePage Banner</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{(Request::is('admin/invoice*')) ? 'menu-is-opening menu-open' : ''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>
                invoices
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('invoice.edit',1)}}" class="nav-link {{(Request::is('admin/invoice')) ? 'active' : ''}}">
                  <i class="fas fa-images nav-icon"></i>
                  <p>edit invoices</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('invoice.create')}}" class="nav-link {{(Request::is('admin/invoice/show')) ? 'active' : ''}}">
                  <i class="fa fa-pencil-alt nav-icon"></i>
                  <p>Create invoice</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>