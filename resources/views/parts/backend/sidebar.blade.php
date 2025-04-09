<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ATX Management</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.dashboard.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
    </div>
    @include('parts.backend.menu_item', [
        'title' => 'Orders',
        'name' => 'orders',
        'except' => 1
   ])
    <hr class="sidebar-divider">

    @include('parts.backend.menu_item', [
        'title' => 'Students',
        'name' => 'students',
   ])

    @include('parts.backend.menu_item', [
        'title' => 'Users',
        'name' => 'users'
   ])
    @include('parts.backend.menu_item', [
        'title' => 'Teachers',
        'name' => 'teachers'
   ])



    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
    </div>

    @include('parts.backend.menu_item', [
        'title' => 'Categories',
        'name' => 'categories'
   ])
    @include('parts.backend.menu_item', [
        'title' => 'Courses',
        'name' => 'courses',
        'includes' => ['/admin/lessons/*']
   ])

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>