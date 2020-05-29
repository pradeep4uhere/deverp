<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>g</b>4S</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Go4Shop</b>.online</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
       <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-slide-dropdown">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{route('home')}}"><i class="fa fa-home"></i>&nbsp;</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-slide-dropdown">
        <ul class="nav navbar-nav">
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Sellers<span class="caret"></span></a>       
        <ul class="dropdown-menu" role="menu">
                <li><a href="#"><i class="fa fa-shopping-cart"></i>&nbsp;All Seller</a></li>
                <li><a href="#"><i class="fa fa-plus"></i>&nbsp;Add New Seller</a></li>
                <li class="divider"></li>
                <li><a href="#">All New Seller</a></li>
                <li><a href="#">Pending KYC Seller</a></li>
              </ul>                
            </li>

            <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i>&nbsp;&nbsp;Products<span class="caret"></span></a>       
        <ul class="dropdown-menu" role="menu">
                <li><a href="#"><i class="fa fa-list"></i>&nbsp;All Products</a></li>
                <li><a href="#"><i class="fa fa-plus"></i>&nbsp;Add New Product</a></li>
                <li class="divider"></li>
                <li><a href="#">All New Products</a></li>
                <li><a href="#">Pending Products</a></li>
              </ul>                
            </li>



             <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i>&nbsp;&nbsp;Customer<span class="caret"></span></a>       
        <ul class="dropdown-menu" role="menu">
                <li><a href="#"><i class="fa fa-users"></i>&nbsp;All Customer</a></li>
                <li><a href="#"><i class="fa fa-user"></i>&nbsp;Add New User</a></li>
                <li class="divider"></li>
                <li><a href="#">All New Customer</a></li>
                <li><a href="#">Pending Customer</a></li>
              </ul>                
            </li>


             <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Orders<span class="caret"></span></a>       
        <ul class="dropdown-menu" role="menu">
                <li><a href="#"><i class="fa fa-list"></i>&nbsp;All Orders</a></li>
                <li><a href="#"><i class="fa fa-inr"></i>&nbsp;Today Orders</a></li>
                <li><a href="#"><i class="fa fa-inr"></i>&nbsp;Weekly Orders</a></li>
                <li><a href="#"><i class="fa fa-inr"></i>&nbsp;Monthly Orders</a></li>
                <li class="divider"></li>
                <li><a href="#">Pending Orders</a></li>
                <li><a href="#">Cancel Orders</a></li>
                <li><a href="#">Other Orders</a></li>
              </ul>                
            </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i>&nbsp;&nbsp;Reports<span class="caret"></span></a>       
            <ul class="dropdown-menu" role="menu">
                <li><a href="#"><i class="fa fa-list"></i>&nbsp;All Products</a></li>
                <li><a href="#"><i class="fa fa-plus"></i>&nbsp;Add New Product</a></li>
                <li class="divider"></li>
                <li><a href="#">All New Products</a></li>
                <li><a href="#">Pending Products</a></li>
              </ul>                
            </li>


              <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gears"></i>&nbsp;&nbsp;Global Settings<span class="caret"></span></a>       
        <ul class="dropdown-menu" role="menu">
                <li><a href="#"><i class="fa fa-gear"></i>&nbsp;Global Setting</a></li>
                <li><a href="{{route('allpages')}}"><i class="fa fa-flag-o"></i>&nbsp;All Pages</a></li>
                <li><a href="{{route('allmenumanage')}}"><i class="fa fa-list"></i>&nbsp;All Menu</a></li>
                <li><a href="{{route('statelist')}}"><i class="fa fa-map-marker"></i>&nbsp;All Location</a></li>
                <li class="divider"></li>
                <li><a href="#">All New Products</a></li>
                <li><a href="#">Pending Products</a></li>
              </ul>                
            </li>

             <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i>&nbsp;&nbsp;Misc<span class="caret"></span></a>       
        <ul class="dropdown-menu" role="menu">
                <li><a href="#"><i class="fa fa-help"></i>&nbsp;All Subscriber</a></li>
                <li><a href="#"><i class="fa fa-plus"></i>&nbsp;Contact Us Message</a></li>
                <li class="divider"></li>
                <li><a href="#">All New Products</a></li>
                <li><a href="#">Pending Products</a></li>
              </ul>                
            </li>




        </ul>
       
        <ul class="nav navbar-nav navbar-right">
           <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{config('global.BACKENDCMS')}}/backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{config('global.BACKENDCMS')}}/backend/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{config('global.BACKENDCMS')}}/backend/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{config('global.BACKENDCMS')}}/backend/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{config('global.BACKENDCMS')}}/backend/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{config('global.BACKENDCMS')}}/backend/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"> {{ ucwords(Auth::user()->name) }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{config('global.BACKENDCMS')}}/backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  {{ ucwords(Auth::user()->name) }}
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
        </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </nav>
  </header>