<nav id="sidebar" aria-label="Main Navigation">
  <!-- Side Header -->
  <div class="content-header bg-white-5">
    <!-- Logo -->
    <a class="font-w600 text-dual" href="/">
      <i class="fa fa-graduation-cap text-success"></i>
      <span class="smini-hide">
        <span class="font-w700 font-size-h5">EduFund</span>
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
          href="{{ route('dashboard') }}">
          <i class="nav-main-link-icon si si-speedometer"></i>
          <span class="nav-main-link-name">Dashboard</span>
        </a>
      </li>

      <li class="nav-main-heading">OVERVIEW</li>

      <li
        class="nav-main-item {{ request()->is('admin/applications/*') ? ' open' : '' }}">
        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false"
          href="#">
          <i class="nav-main-link-icon si si-note"></i>
          <span class="nav-main-link-name">Applications</span>
        </a>
        <ul class="nav-main-submenu">
          <li class="nav-main-item">
            <a class="nav-main-link {{ request()->routeIs('all-applications') ? ' active' : '' }}"
              href="{{ route('all-applications') }}">
              <span class="nav-main-link-name">All Applications</span>
            </a>
          </li>
          <li class="nav-main-item">
            <a class="nav-main-link {{ request()->routeIs('approved-applications') ? ' active' : '' }}"
              href="{{ route('approved-applications') }}">
              <span class="nav-main-link-name">Approved</span>
            </a>
          </li>
          <li class="nav-main-item">
            <a class="nav-main-link {{ request()->routeIs('pending-applications') ? ' active' : '' }}"
              href="{{ route('pending-applications') }}">
              <span class="nav-main-link-name">Pending</span>
            </a>
          </li>
          <li class="nav-main-item">
            <a class="nav-main-link {{ request()->routeIs('rejected-applications') ? ' active' : '' }}"
              href="{{ route('rejected-applications') }}">
              <span class="nav-main-link-name">Rejected</span>
            </a>
          </li>
          <li class="nav-main-item">
            <a class="nav-main-link {{ request()->routeIs('sponsored-applications') ? ' active' : '' }}"
              href="{{ route('sponsored-applications') }}">
              <span class="nav-main-link-name">Sponsored</span>
            </a>
          </li>
        </ul>
      </li>

      {{-- <li
        class="nav-main-item {{ request()->is('admin/applications/*') ? ' open' : '' }}">
        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false"
          href="#">
          <i class="nav-main-link-icon si si-graph"></i>
          <span class="nav-main-link-name">Quick Stats</span>
        </a>
        <ul class="nav-main-submenu">
          <li class="nav-main-item">
            <a class="nav-main-link {{ request()->is('admin/applications/all') ? ' active' : '' }}"
              href="{{ route('all-applications') }}">
              <span class="nav-main-link-name">Progress</span>
            </a>
          </li>
        </ul>
      </li> --}}


      @if (Auth::user()->admin)
        <li class="nav-main-heading">MANAGE SCHOOLS</li>


        <li
          class="nav-main-item {{ request()->is('admin/schools*') ? ' open' : '' }}">
          <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false"
            href="#">
            <i class="nav-main-link-icon far fa-building"></i>
            <span class="nav-main-link-name">Schools</span>
          </a>
          <ul class="nav-main-submenu">
            <li class="nav-main-item">
              <a class="nav-main-link {{ request()->routeIs('schools.index')  ? ' active' : '' }}"
                href="{{ route('schools.index') }}">
                <span class="nav-main-link-name">All Schools</span>
              </a>
            </li>
          </ul>
          <ul class="nav-main-submenu">
            <li class="nav-main-item">
              <a class="nav-main-link {{ request()->routeIs('schools.create') ? ' active' : '' }}"
                href="{{ route('schools.create') }}">
                <span class="nav-main-link-name">New School</span>
              </a>
            </li>
          </ul>
        </li>
      @endif


      @if (Auth::user()->admin)
        <li class="nav-main-heading">CUSTOMER CARE</li>


        <li
          class="nav-main-item {{ request()->is('admin/feedbacks/*') ? ' open' : '' }}">
          <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false"
            href="#">
            <i class="nav-main-link-icon si si-bubbles"></i>
            <span class="nav-main-link-name">Feedback</span>
          </a>
          <ul class="nav-main-submenu">
            <li class="nav-main-item">
              <a class="nav-main-link {{ request()->is('admin/feedbacks/comments') ? ' active' : '' }} {{ request()->is('admin/user/edit/*') ? ' active' : '' }}"
                href="{{ route('feedbacks') }}">
                <span class="nav-main-link-name">Issues</span>
              </a>
            </li>
          </ul>
          <ul class="nav-main-submenu">
            <li class="nav-main-item">
              <a class="nav-main-link {{ request()->routeIs('feedbacks.unresolved') ? ' active' : '' }} {{ request()->is('admin/user/edit/*') ? ' active' : '' }}"
                href="{{ route('feedbacks.unresolved') }}">
                <span class="nav-main-link-name">Not Resolved</span>
              </a>
            </li>
          </ul>
          <ul class="nav-main-submenu">
            <li class="nav-main-item">
              <a class="nav-main-link {{ request()->routeIs('feedbacks.resolved') ? ' active' : '' }} {{ request()->is('admin/user/edit/*') ? ' active' : '' }}"
                href="{{ route('feedbacks.resolved') }}">
                <span class="nav-main-link-name">Resolved</span>
              </a>
            </li>
          </ul>
        </li>
      @endif

    </ul>
  </div>
  <!-- END Side Navigation -->
</nav>
