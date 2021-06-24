<nav id="sidebar" aria-label="Main Navigation">
  <!-- Side Header -->
  <div class="content-header bg-white-5">
    <!-- Logo -->
    <a class="font-w600 text-dual" href="index.html">
      <i class="fa fa-circle-notch text-primary"></i>
      <span class="smini-hide">
        <span class="font-w700 font-size-h5">ne</span>
      </span>
    </a>
    <!-- END Logo -->

    <!-- Extra -->
    <div>

      <!-- Close Sidebar, Visible only on mobile screens -->
      <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
      <a class="d-lg-none btn btn-sm btn-dual ml-2" data-toggle="layout" data-action="sidebar_close"
        href="javascript:void(0)">
        <i class="fa fa-fw fa-times"></i>
      </a>
      <!-- END Close Sidebar -->
    </div>
    <!-- END Extra -->
  </div>
  <!-- END Side Header -->

  <!-- Side Navigation -->
  <div class="content-side content-side-full">
    <ul class="nav-main">
      <li class="nav-main-item">
        <a class="nav-main-link {{ Request::is('admin/dashboard', 'admin/dashboard/*') ? 'active' : '' }}"
          href="#">
          <i class="nav-main-link-icon si si-speedometer"></i>
          <span class="nav-main-link-name">Dashboard</span>
        </a>
      </li>

      <li class="nav-main-heading">BLOG</li>

      <li
        class="nav-main-item {{ request()->is('admin/posts/*') ? ' open' : '' }}">
        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false"
          href="#">
          <i class="nav-main-link-icon si si-note"></i>
          <span class="nav-main-link-name">Posts</span>
        </a>
        <ul class="nav-main-submenu">
          <li class="nav-main-item">
            <a class="nav-main-link {{ request()->is('admin/posts/all') ? ' active' : '' }} {{ request()->is('admin/posts/edit/*') ? ' active' : '' }}"
              href="#">
              <span class="nav-main-link-name">All Posts</span>
            </a>
          </li>
          <li class="nav-main-item">
            <a class="nav-main-link {{ request()->is('admin/posts/create') ? ' active' : '' }}"
              href="#">
              <span class="nav-main-link-name">New Post</span>
            </a>
          </li>
          <li class="nav-main-item">
            <a class="nav-main-link {{ request()->is('admin/posts/trashed') ? ' active' : '' }}"
              href="#">
              <span class="nav-main-link-name">Trashed Posts</span>
            </a>
          </li>
        </ul>
      </li>


      <li
        class="nav-main-item {{ request()->is('admin/category/*') ? ' open' : '' }}">
        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false"
          href="#">
          <i class="nav-main-link-icon si si-grid"></i>
          <span class="nav-main-link-name">Categories</span>
        </a>
        <ul class="nav-main-submenu">
          <li class="nav-main-item">
            <a class="nav-main-link {{ request()->is('admin/category/all') ? ' active' : '' }} {{ request()->is('admin/category/edit/*') ? ' active' : '' }}"
              href="#">
              <span class="nav-main-link-name">All Categories</span>
            </a>
          </li>
          <li class="nav-main-item">
            <a class="nav-main-link  {{ request()->is('admin/category/create') ? ' active' : '' }}"
              href="#">
              <span class="nav-main-link-name">New Category</span>
            </a>
          </li>
        </ul>
      </li>

      <li
        class="nav-main-item {{ request()->is('admin/tag/*') ? ' open' : '' }}">
        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false"
          href="#">
          <i class="nav-main-link-icon si si-tag"></i>
          <span class="nav-main-link-name">Tags</span>
        </a>
        <ul class="nav-main-submenu">
          <li class="nav-main-item">
            <a class="nav-main-link {{ request()->is('admin/tag/all') ? ' active' : '' }} {{ request()->is('admin/tag/edit/*') ? ' active' : '' }}"
              href="#">
              <span class="nav-main-link-name">All Tags</span>
            </a>
          </li>
          <li class="nav-main-item">
            <a class="nav-main-link  {{ request()->is('admin/tag/create') ? ' active' : '' }}"
              href="#">
              <span class="nav-main-link-name">New Tag</span>
            </a>
          </li>
        </ul>
      </li>


      @if (Auth::user()->admin)
      <li class="nav-main-heading">MANAGE USERS</li>


      <li
        class="nav-main-item {{ request()->is('admin/user/*') ? ' open' : '' }}">
        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false"
          href="#">
          <i class="nav-main-link-icon si si-grid"></i>
          <span class="nav-main-link-name">Users</span>
        </a>
        <ul class="nav-main-submenu">
          <li class="nav-main-item">
            <a class="nav-main-link {{ request()->is('admin/user/all') ? ' active' : '' }} {{ request()->is('admin/user/edit/*') ? ' active' : '' }}"
              href="#">
              <span class="nav-main-link-name">All Users</span>
            </a>
          </li>
          <li class="nav-main-item">
            <a class="nav-main-link  {{ request()->is('admin/user/create') ? ' active' : '' }}"
              href="#">
              <span class="nav-main-link-name">New User</span>
            </a>
          </li>
        </ul>
      </li>
      @endif

      <li class="nav-main-item">
        <a class="nav-main-link  {{ request()->is('admin/user/profile') ? ' active' : '' }}"
          href="#">
          <span class="nav-main-link-name">My Profile</span>
        </a>
      </li>


      @if (Auth::user()->admin)
      <li class="nav-main-item">
        <a class="nav-main-link  {{ request()->is('admin/settings') ? ' active' : '' }}"
          href="#">
          <span class="nav-main-link-name">Site Settings</span>
        </a>
      </li>
      @endif

    </ul>
  </div>
  <!-- END Side Navigation -->
</nav>
