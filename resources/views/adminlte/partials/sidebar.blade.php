<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('/adminlte/dist/img/AdminLTELogo.png')}}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Question & Answer</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://2.bp.blogspot.com/_b-XQKLD7dw4/TZzevAjc9AI/AAAAAAAABF4/FuD9XdWm-F0/s512/CorelDraw%20X5%20-%20Minjiplak%20Warna03.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        
        <div class="info">
        @guest
        @if (Route::has('register'))
          <a href="{{ route('login') }}" class="d-block">Login</a>
          @endif
          @else
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
          @endguest
        </div>
       
      </div>
      <!-- Sidebar Menu -->
      <!-- <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="active">
            <a href="{{ route('pertanyaan.index')}}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>Home</p>
            </a>
          </li>
        </ul>
      </nav> -->
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>