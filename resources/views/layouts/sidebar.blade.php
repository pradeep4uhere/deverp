  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{config('global.BACKENDCMS')}}/backend/dist/img/user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <a href="{{route('home')}}"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu</li>
        <li>
          <a href="{{route('home')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
          
        </li>
        
        <li class="treeview">
          <a href="#">
          <i class="fa fa-files-o"></i>
            <span>Manage Sellers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
           <ul class="treeview-menu">
          @guest
          @else
          <li><a class="nav-link" href="{{ route('sellerList') }}"><i class="fa fa-list"></i>&nbsp;All Seller</a></li>
          <li><a class="nav-link" href="{{ route('roles.index') }}"><i class="fa fa-plus"></i>&nbsp;Add New Seller</a></li>
          @endguest
          </ul>
        </li>
         <li><a href="{{route('allOrder')}}"><i class="fa fa-pie-chart"></i><span>All Orders</span></a></li>
        <li><a class="nav-link" href="{{ route('customerList') }}"><i class="fa fa-user"></i><span>All Customer</span></a></li>
       
        <li class="treeview">
          <a href="#">
          <i class="fa fa-files-o"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
           <ul class="treeview-menu">
              <li><a class="nav-link" href="{{ route('productList') }}"><i class="fa fa-plus"></i> New Products</a></li>
              <li><a class="nav-link" href="{{ route('productList') }}"><i class="fa fa-list"></i> All Products</a></li>
          </ul>
        </li>
        </li>
        <li class="header">Report</li>
        <li class="treeview">
          <a href="#">
          <i class="fa fa-files-o"></i>
            <span>All Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
           <ul class="treeview-menu">
              <li><a class="nav-link" href="{{ route('products.index') }}">Order Report</a></li>
              <li><a class="nav-link" href="{{ route('users.index') }}">Seller Report</a></li>
              <li><a class="nav-link" href="{{ route('roles.index') }}">Customer Report</a></li>
              <li><a class="nav-link" href="{{ route('products.index') }}">Payment Report</a></li>
          </ul>
        </li>

        <li class="header">Manage Global Settings</li>
        <li class="treeview">
          <a href="#">
          <i class="fa fa-files-o"></i>
            <span>Manage</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
           <ul class="treeview-menu">
          @guest
          @else
          <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
          <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>
          <li><a class="nav-link" href="{{ route('products.index') }}">Manage Product</a></li>
          @endguest
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
          <i class="fa fa-files-o"></i>
            <span>Manage Sellers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
           <ul class="treeview-menu">
          <li>
            <a class="nav-link" href="{{ route('sellerList') }}"><i class="fa fa-list"></i>&nbsp;All Seller</a>

          </li>
          <li>
            <a class="nav-link" href="{{ route('roles.index') }}"><i class="fa fa-plus"></i>&nbsp;Add New Seller</a>
          </li>
          </ul>
        </li>



      
        <li>
            <a class="nav-link" href="{{ route('setting') }}">
              <i class="fa fa-gear"></i><span>Setting</span>
            </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Manage All Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
            <li>
              <a class="nav-link" href="{{ route('allpages') }}"> 
                <i class="fa fa-tag"></i></i>Manage Pages
              </a>
            </li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Manage Menus</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                 <li>
                    <a class="nav-link" href="{{ route('allmenu') }}">
                      <i class="fa fa-plus"></i> Add Menu
                    </a>
                  </li>

                  <li>
                      <a class="nav-link" href="{{ route('allmenumanage') }}">
                        <i class="fa fa-list"></i> Manage Menu
                      </a>
                  </li>

            </ul>
         </li>

          
          
         
          <li class="treeview">
            <a class="nav-link" href="{{route('alluserlist')}}"><i class="fa fa-users"></i><span>All Users</span></a>
          </li>
          <li  class="treeview">
            <a class="nav-link" href="{{route('allsubscriberlist')}}"><i class="fa fa-list"></i><span>All Subscriber</span></a>
          </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>