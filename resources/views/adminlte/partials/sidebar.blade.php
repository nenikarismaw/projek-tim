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
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- <div class="info"> -->
            <!-- <a href="{{ route('pertanyaan.index') }}">
              <i class="nav-icon fas fa-list"></i>
              <p>Questions List</p>
            </a> -->
            <li class="nav-item"></li>
                <a href="{{ route('pertanyaan.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-list"></i>
                  <p>Question List</p>
                </a>
            </li>
            <!-- <a href="{{ route('pertanyaan.create') }}">New Create Question</a> -->
            <li class="nav-item"></li>
                <a href="{{ route('pertanyaan.create') }}" class="nav-link">
                  <i class="nav-icon far fa-plus-square"></i>
                  <p>New Create Question</p>
                </a>
            </li>
          <!-- </div> -->
          </ul>
        </nav>
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