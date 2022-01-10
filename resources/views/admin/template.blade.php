<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Admin Dishcount</title>
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" crossorigin="anonymous" />
        <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js') }}" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css"
            href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css') }}">

        <link href="{{ asset('select2/dist/css/select2.min.css') }}" rel="stylesheet">


    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="/dashboard">DishCount.id</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                {{-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div> --}}
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <span class="dropdown-item font-weight-bold">Hai, {{ auth()->user()->name }}</span>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Dashboard</div>
                            <a class="nav-link" href="/dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            {{-- Menu user  --}}
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                User
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/user_level">Data User Level</a>
                                    <a class="nav-link" href="/user">Daftar User</a>
                                </nav>
                            </div>

                            {{-- Menu kategori diskon  --}}
                            <a class="nav-link" href="/kategori_diskon">
                                <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
                                Data Kategori Diskon
                            </a>

                            {{-- Menu diskon  --}}
                            <a class="nav-link" href="/diskon">
                                <div class="sb-nav-link-icon"><i class="fas fa-percent"></i></div>
                                Data Diskon
                            </a>

                            {{-- Menu riwayat klaim diskon  --}}
                            <a class="nav-link" href="/klaim_diskon">
                                <div class="sb-nav-link-icon"><i class="fas fa-certificate"></i></div>
                                Data Klaim Diskon
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{ auth()->user()->level->deskripsi_level }}
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                @include('sweet::alert')

                @yield('content-core')
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Dishcount 2021</div>
                            {{-- <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div> --}}
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="{{ asset('https://code.jquery.com/jquery-3.5.1.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js') }}" crossorigin="anonymous"></script>
        {{-- <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script> --}}
        <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
        {{-- <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js') }}" charset="utf-8"></script> --}}
        <script src="{{ asset('https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/demo/datatables-demo.js') }}"></script>
        <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js') }}"></script>
        <script src="{{ asset('js/dashboard.js') }}"></script>
        <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
        <script src="{{ asset('select2/dist/js/select2.min.js') }}"></script>


        <script>
            @if(session('success'))
            swal("Berhasil!", "{{ session('success') }}", "success");
            @endif

            @if(session('error'))
            swal("Gagal!", "{{ session('error') }}", "error");
            @endif

            function chkFile(file) {
                var files = [];
                for (var i = 0; i < $(file)[0].files.length; i++) {
                    files.push($(file)[0].files[i].name);
                }
                $(file).next('.custom-file-label').html(files.join(', '));
            }

            $(".pilihKota").select2({
                width: '100%'
            });
            $(document).ready(function() {
				CKEDITOR.replaceClass = 'ckeditor';

                $('.form-select2').select2();


            });


        </script>

    </body>
</html>
