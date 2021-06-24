<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Edufund</title>

  <link rel="icon" href="{{ asset('landing/assets/img/favicon.png') }}" type="image/png">
  <!-- Stylesheets -->
  <!-- Fonts and OneUI framework -->
  <link rel="stylesheet"
    href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700') }}">
  <link rel="stylesheet" id="css-main" href="{{ asset('admin/assets/css/oneui.min.css') }}">

  <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
  <!-- <link rel="stylesheet" id="css-theme" href="admin/assets/css/themes/amethyst.min.css"> -->
  <!-- END Stylesheets -->

  @yield('headerfiles')

</head>

<body>
  <!-- Page Container -->
  <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed">

    <!-- Sidebar -->
    @include('admin.layouts/sidebar')
    <!-- END Sidebar -->

    <!-- Header -->

    <header id="page-header">
      <!-- Header Content -->
      <div class="content-header">
        <!-- Left Section -->
        <div class="d-flex align-items-center">
          <!-- Toggle Sidebar -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
          <button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none" data-toggle="layout"
            data-action="sidebar_toggle">
            <i class="fa fa-fw fa-bars"></i>
          </button>
          <!-- END Toggle Sidebar -->

          <!-- Toggle Mini Sidebar -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
          <button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" data-toggle="layout"
            data-action="sidebar_mini_toggle">
            <i class="fa fa-fw fa-ellipsis-v"></i>
          </button>
          <!-- END Toggle Mini Sidebar -->
        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="d-flex align-items-center">
          <!-- User Dropdown -->
          <div class="dropdown d-inline-block ml-2">
            <button type="button" class="btn btn-sm btn-dual" id="page-header-user-dropdown" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <img class="rounded" src="{{ asset('admin/assets/media/avatars/avatar10.jpg') }}"
                alt="Header Avatar" style="width: 18px;">
              <span class="d-none d-sm-inline-block ml-1">{{ Auth::user()->name }}</span>
              <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm"
              aria-labelledby="page-header-user-dropdown">
              <div class="p-2">
                <a class="dropdown-item d-flex align-items-center justify-content-between"
                  href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                  <i class="si si-logout ml-1"></i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                  style="display: none;">
                  @csrf
                </form>

              </div>
            </div>
          </div>
          <!-- END User Dropdown -->

          <!-- Notifications Dropdown -->
          {{-- <div class="dropdown d-inline-block ml-2">
            <button type="button" class="btn btn-sm btn-dual" id="page-header-notifications-dropdown"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="si si-bell"></i>
              <span class="badge badge-primary badge-pill">6</span>
            </button>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0 border-0 font-size-sm"
              aria-labelledby="page-header-notifications-dropdown">
              <div class="p-2 bg-primary text-center">
                <h5 class="dropdown-header text-uppercase text-white">Notifications</h5>
              </div>
              <ul class="nav-items mb-0">

                <li>
                  <a class="text-dark media py-2" href="javascript:void(0)">
                    <div class="mr-2 ml-3">
                      <i class="fa fa-fw fa-check-circle text-success"></i>
                    </div>
                    <div class="media-body pr-2">
                      <div class="font-w600">You have a new follower</div>
                      <small class="text-muted">42 min ago</small>
                    </div>
                  </a>
                </li>
              </ul>
              <div class="p-2 border-top">
                <a class="btn btn-sm btn-light btn-block text-center" href="javascript:void(0)">
                  <i class="fa fa-fw fa-arrow-down mr-1"></i> Load More..
                </a>
              </div>
            </div>
          </div> --}}
          <!-- END Notifications Dropdown -->

        </div>
        <!-- END Right Section -->
      </div>
      <!-- END Header Content -->

      <!-- Header Search -->
      <div id="page-header-search" class="overlay-header bg-white">
        <div class="content-header">
          <form class="w-100" action="be_pages_generic_search.html" method="POST">
            <div class="input-group input-group-sm">
              <div class="input-group-prepend">
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-danger" data-toggle="layout" data-action="header_search_off">
                  <i class="fa fa-fw fa-times-circle"></i>
                </button>
              </div>
              <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input"
                name="page-header-search-input">
            </div>
          </form>
        </div>
      </div>
      <!-- END Header Search -->

      <!-- Header Loader -->
      <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
      <div id="page-header-loader" class="overlay-header bg-white">
        <div class="content-header">
          <div class="w-100 text-center">
            <i class="fa fa-fw fa-circle-notch fa-spin"></i>
          </div>
        </div>
      </div>
      <!-- END Header Loader -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->

    @yield('main-content')


    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="bg-body-light">
      <div class="content py-3">
        <div class="row font-size-sm">
          <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-left">
            Edufund &copy; <span data-toggle="year-copy"></span>
          </div>
        </div>
      </div>
    </footer>
    <!-- END Footer -->

    <!-- Apps Modal -->
    <!-- Opens from the modal toggle button in the header -->
    {{-- <div class="modal fade" id="one-modal-apps" tabindex="-1" role="dialog" aria-labelledby="one-modal-apps"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-top modal-sm" role="document">
        <div class="modal-content">
          <div class="block block-themed block-transparent mb-0">
            <div class="block-header bg-primary-dark">
              <h3 class="block-title">Apps</h3>
              <div class="block-options">
                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                  <i class="si si-close"></i>
                </button>
              </div>
            </div>
            <div class="block-content block-content-full">
              <div class="row gutters-tiny">
                <div class="col-6">
                  <!-- CRM -->
                  <a class="block block-rounded block-themed bg-default" href="javascript:void(0)">
                    <div class="block-content text-center">
                      <i class="si si-speedometer fa-2x text-white-75"></i>
                      <p class="font-w600 font-size-sm text-white mt-2 mb-3">
                        CRM
                      </p>
                    </div>
                  </a>
                  <!-- END CRM -->
                </div>
                <div class="col-6">
                  <!-- Products -->
                  <a class="block block-rounded block-themed bg-danger" href="javascript:void(0)">
                    <div class="block-content text-center">
                      <i class="si si-rocket fa-2x text-white-75"></i>
                      <p class="font-w600 font-size-sm text-white mt-2 mb-3">
                        Products
                      </p>
                    </div>
                  </a>
                  <!-- END Products -->
                </div>
                <div class="col-6">
                  <!-- Sales -->
                  <a class="block block-rounded block-themed bg-success mb-0" href="javascript:void(0)">
                    <div class="block-content text-center">
                      <i class="si si-plane fa-2x text-white-75"></i>
                      <p class="font-w600 font-size-sm text-white mt-2 mb-3">
                        Sales
                      </p>
                    </div>
                  </a>
                  <!-- END Sales -->
                </div>
                <div class="col-6">
                  <!-- Payments -->
                  <a class="block block-rounded block-themed bg-warning mb-0" href="javascript:void(0)">
                    <div class="block-content text-center">
                      <i class="si si-wallet fa-2x text-white-75"></i>
                      <p class="font-w600 font-size-sm text-white mt-2 mb-3">
                        Payments
                      </p>
                    </div>
                  </a>
                  <!-- END Payments -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
    <!-- END Apps Modal -->

     <!-- Toast  -->
     <div style="position: fixed; top: 2rem; right: 2rem; z-index: 9999999;">
     <div id="toast-example-1" class="toast fade hide" data-delay="4000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <i class="si si-check text-success mr-2"></i>
            <strong class="mr-auto">{{ Session::get('title') }}</strong>
            <small class="text-muted">just now</small>
            <button type="button" class="ml-2 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            {{ Session::get('success') }}
        </div>
    </div>
    </div>
  <!-- END Toast  -->

       <!-- Info Toast  -->
       <div style="position: fixed; top: 2rem; right: 2rem; z-index: 9999999;">
        <div id="info-toast" class="toast fade hide" data-delay="4000" role="alert" aria-live="assertive" aria-atomic="true">
           <div class="toast-header">
               <i class="si si-info text-primary mr-2"></i>
               <strong class="mr-auto">{{ Session::get('title') }}</strong>
               <small class="text-muted">just now</small>
               <button type="button" class="ml-2 close" data-dismiss="toast" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="toast-body">
               {{ Session::get('info') }}
           </div>
       </div>
       </div>
     <!-- END Info Toast  -->


  </div>
  <!-- END Page Container -->

  <!--
            OneUI JS Core

            Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
            to handle those dependencies through webpack. Please check out admin/assets/_es6/main/bootstrap.js for more info.

            If you like, you could also include them separately directly from the admin/assets/js/core folder in the following
            order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.


            admin/assets/js/core/bootstrap.bundle.min.js
            admin/assets/js/core/simplebar.min.js
            admin/assets/js/core/jquery-scrollLock.min.js
            admin/assets/js/core/jquery.appear.min.js
            admin/assets/js/core/js.cookie.min.js
        -->




  <script src="{{ asset('admin/assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/oneui.core.min.js') }}"></script>
{{--
  <script src="{{ asset('admin/assets/js/core/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/core/simplebar.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/core/jquery-scrollLock.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/core/jquery.appear.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/core/js.cookie.min.js') }}"></script> --}}

  <!--
            OneUI JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at admin/assets/_es6/main/app.js
        -->
  <script src="{{ asset('admin/assets/js/oneui.app.min.js') }}"></script>

  <!-- Page JS Plugins -->
  <script src="{{ asset('admin/assets/js/plugins/chart.js/Chart.bundle.min.js') }}"></script>

  <!-- Page JS Code -->
  <script src="{{ asset('admin/assets/js/pages/be_pages_dashboard.min.js') }}"></script>

  <script>

    @if(Session::has('success'))
      jQuery('#toast-example-1').toast('show');
    @endif

    @if(Session::has('info'))
      jQuery('#info-toast').toast('show');
    @endif

  </script>


  @yield('footer')

</body>

</html>
