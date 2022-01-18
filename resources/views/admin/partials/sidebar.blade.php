<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
  id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center"
    href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Laravel Blog</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="{{route('admin.home')}}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <li class="nav-item active">
    <a class="nav-link" href="{{route('admin.home')}}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Area publica</span></a>
  </li>

  @if(Route::has("admin.users.index") && Auth::user()->role === "admin")
  <li class="nav-item active">
    <a class="nav-link" href="{{route('admin.users.index')}}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Utenti</span></a>
  </li>
  @endif

  @if(Route::has("admin.posts"))
  <li class="nav-item active">
    <a class="nav-link" href="{{route('admin.posts')}}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Post</span></a>
  </li>
  @endif
</ul>