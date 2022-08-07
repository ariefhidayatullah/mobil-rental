<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Syndash - Bootstrap4 Admin Template</title>
    <!--favicon-->
    <link rel="icon" href="{{asset('assets')}}/assets/images/favicon-32x32.png" type="image/png" />
    <!-- Vector CSS -->
    <link href="{{asset('assets')}}/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!--plugins-->
    <link href="{{asset('assets')}}/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    {{-- <link href="{{asset('assets')}}/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" /> --}}
    <link href="{{asset('assets')}}/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!--Data Tables -->
	<link href="{{asset('assets')}}/assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
	<link href="{{asset('assets')}}/assets/plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <!-- loader-->
    <link href="{{asset('assets')}}/assets/css/pace.min.css" rel="stylesheet" />
    <script src="{{asset('assets')}}/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/assets/css/bootstrap.min.css" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/assets/css/icons.css" />
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/assets/css/app.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/assets/css/dark-sidebar.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/assets/css/dark-theme.css" />
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('template')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('template')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('template')}}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    @stack('css')
</head>

<body>
    <!-- wrapper -->
    <div class="wrapper">
        <!--sidebar-wrapper-->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div class="">
                    <img src="{{asset('assets')}}/assets/images/logo-icon.png" class="logo-icon-2" alt="" />
                </div>
                <div>
                    <h4 class="logo-text">Syndash</h4>
                </div>
                <a href="javascript:;" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
                </a>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li class="{{ isset($dashboard) ? $dashboard : '' }}">
                    <a href="{{ url('home') }}">
                        <div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <li class="menu-label">Web Apps</li>
                @if(Auth::user()->role == 'admin')
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon icon-color-1"><i class="bx bx-car"></i>
                        </div>
                        <div class="menu-title">Mobil</div>
                    </a>
                    <ul>
                        <li> <a href="{{ url('merk') }}"><i class="bx bx-right-arrow-alt"></i>Daftar Merk Mobil</a>
                        </li>
                        <li> <a href="{{ url('mobil') }}"><i class="bx bx-right-arrow-alt"></i>Daftar Mobil</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('pengguna') }}">
                        <div class="parent-icon icon-color-3"> <i class="bx bx-user"></i>
                        </div>
                        <div class="menu-title">Pengguna</div>
                    </a>
                </li>
                @endif
                @if (Auth::user()->role == 'admin')
                <li>
                    <a href="{{ url('rental') }}">
                        <div class="parent-icon icon-color-4"><i class="bx bx-transfer"></i>
                        </div>
                        <div class="menu-title">Rental Mobil</div>
                    </a>
                </li>
                <li>
                    <a href="{{ url('manage_user') }}">
                        <div class="parent-icon icon-color-3"> <i class="bx bx-user"></i>
                        </div>
                        <div class="menu-title">Manage User</div>
                    </a>
                </li>
                <li>
                    <a href="{{ url('history') }}">
                        <div class="parent-icon icon-color-3"> <i class="bx bx-history"></i>
                        </div>
                        <div class="menu-title">History</div>
                    </a>
                </li>
                @endif
                @if(Auth::user()->role == 'manager' || Auth::user()->role == 'sopir')
                <li>
                    <a href="{{ url('verifikasi') }}">
                        <div class="parent-icon icon-color-5"><i class="bx bx-check-circle"></i>
                        </div>
                        <div class="menu-title">Verifikasi</div>
                    </a>
                </li>
                <li>
                    <a href="{{ url('manage_user') }}">
                        <div class="parent-icon icon-color-3"> <i class="bx bx-user"></i>
                        </div>
                        <div class="menu-title">Manage User</div>
                    </a>
                </li>
                <li>
                    <a href="{{ url('history') }}">
                        <div class="parent-icon icon-color-3"> <i class="bx bx-history"></i>
                        </div>
                        <div class="menu-title">History</div>
                    </a>
                </li>
                @endif
                <li>
                    <a href="to-do.html">
                        <div class="parent-icon icon-color-6"><i class="bx bx-info-circle"></i>
                        </div>
                        <div class="menu-title">About</div>
                    </a>
                </li>
            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar-wrapper-->
        <!--header-->
        <header class="top-header">
            <nav class="navbar navbar-expand">
                <div class="left-topbar d-flex align-items-center">
                    <a href="javascript:;" class="toggle-btn"> <i class="bx bx-menu"></i>
                    </a>
                </div>
                <div class="flex-grow-1 search-bar">
                    <div class="input-group">
                        <div class="input-group-prepend search-arrow-back">
                            <button class="btn btn-search-back" type="button"><i class="bx bx-arrow-back"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control" placeholder="search" />
                        <div class="input-group-append">
                            <button class="btn btn-search" type="button"><i class="lni lni-search-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="right-topbar ml-auto">
                    <ul class="navbar-nav">
                        {{-- <li class="nav-item search-btn-mobile">
                            <a class="nav-link position-relative" href="javascript:;"> <i
                                    class="bx bx-search vertical-align-middle"></i>
                            </a>
                        </li> --}}
                        <li class="nav-item dropdown dropdown-user-profile">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                                data-toggle="dropdown">
                                <div class="media user-box align-items-center">
                                    <div class="media-body user-info">
                                        <p class="user-name mb-0">{{Auth::user()->name}}</p>
                                        <p class="designattion mb-0">Available</p>
                                    </div>
                                    <img src="https://via.placeholder.com/110x110" class="user-img" alt="user avatar">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item"
                                    href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i
                                        class="bx bx-cloud-download"></i><span>Logout</span></a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>


        @yield('content')

        {{-- <div class="overlay toggle-btn-mobile"></div> --}}
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <!--footer -->
        <div class="footer">
            <p class="mb-0">Si Surat Desa @2021 | Developed By : Arfhdytllh
            </p>
        </div>
        <!-- end footer -->
    </div>
    <!-- end wrapper -->
    <!--start switcher-->

    <!--end switcher-->
    <!-- JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('assets')}}/assets/js/jquery.min.js"></script>
    <script src="{{asset('assets')}}/assets/js/popper.min.js"></script>
    <script src="{{asset('assets')}}/assets/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="{{asset('template')}}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('template')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('template')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('template')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!--plugins-->
    <script src="{{asset('assets')}}/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="{{asset('assets')}}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    {{-- <script src="{{asset('assets')}}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script> --}}
    <!-- Vector map JavaScript -->
    <script src="{{asset('assets')}}/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{asset('assets')}}/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{asset('assets')}}/assets/plugins/vectormap/jquery-jvectormap-in-mill.js"></script>
    <script src="{{asset('assets')}}/assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js"></script>
    <script src="{{asset('assets')}}/assets/plugins/vectormap/jquery-jvectormap-uk-mill-en.js"></script>
    <script src="{{asset('assets')}}/assets/plugins/vectormap/jquery-jvectormap-au-mill.js"></script>
    <!-- <script src="{{asset('assets')}}/assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script> -->
    <script src="{{asset('assets')}}/assets/js/index.js"></script>
    <!-- Jquery Validate -->
    <script src="{{asset('template')}}/plugins/jquery-validation/jquery.validate.js"></script>
    <script src="{{asset('template')}}/plugins/jquery-validation/localization/messages_id.js"></script>
    <!-- Toastr -->
    <script src="{{asset('template')}}/plugins/toastr/toastr.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="{{asset('template')}}/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!--Data Tables js-->
	<script src="{{asset('assets')}}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function () {
			//Default data table
			$('#example').DataTable();
			var table = $('#example2').DataTable({
				lengthChange: false,
				buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
			});
			table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
		});
	</script>
    <!-- App JS -->
    <script src="{{asset('assets')}}/assets/js/app.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace()
        var success = "{{Session::get('success')}}";
    var error = "{{Session::get('error')}}";
    $(document).ready(function() {
        if (success) {
            Swal.fire({
                title: 'Berhasil !',
                text: success,
                icon: 'success'
            });
        }
        if (error) {
            Swal.fire({
                title: 'kesalahan !',
                text: error,
                icon: 'error'
            });
        }
    });
    </script>
    @stack('content-js')
</body>

</html>
