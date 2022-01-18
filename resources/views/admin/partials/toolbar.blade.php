<nav
  class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop"
    class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>



  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">


    {{-- <div class="topbar-divider d-none d-sm-block"></div> --}}

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown"
        role="button" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
          {{ Auth::user()->name }}
        </span>
        
      </a>
      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="userDropdown">
        {{-- <a class="dropdown-item" href="#">
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          Profile
        </a>
        <a class="dropdown-item" href="#">
          <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
          Settings
        </a>
        <a class="dropdown-item" href="#">
          <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
          Activity Log
        </a> --}}
        {{-- <div class="dropdown-divider"></div> --}}
        <a class="dropdown-item" href="#" data-bs-toggle="modal"
          data-bs-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Logout
        </a>
      </div>
    </li>
  </ul>
</nav>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-bs-dismiss="modal"
          aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        Sei sicuro di voler uscire dalla propria sessione? Per continuare
        premere su "Logout".</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button"
          data-bs-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="{{ route('logout') }}" 
          onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST"
          class="d-none">
          @csrf
        </form>
      </div>
    </div>
  </div>
</div>