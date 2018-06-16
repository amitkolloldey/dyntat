<header class="main-header">
    <!-- Logo -->
    <a href="{{ route('adminHome') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>D</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>DYNTAT</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
      <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background:rgba(0, 0, 0, 0.1)">
      @if($userImg = json_decode(Auth::user()->picture))
              <img src="{{ adminUrl($userImg->thumb) }} " class="user-image" alt="User Image">
      @endif
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
        @if($userImg = json_decode(Auth::user()->picture))
                <img src="{{ adminUrl($userImg->thumb) }}" class="img-circle" alt="User Image">
        @endif
                <p>
                  {{ Auth::user()->name }}
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route('user.profile')}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">Sign out</a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
          </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>

    </nav>
</header>
