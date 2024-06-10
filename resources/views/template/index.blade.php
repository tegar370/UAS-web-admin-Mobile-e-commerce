<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>WEB TOKOTO </title>
    <link rel="icon" href="{{asset('images/logo-kantor.png')}}" type="image/x-icon">
    <meta name="description" content="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">

    <style>
        .row {
            display: flex;
            width: 100%;
            justify-content: center;
            gap: 10px;
        }

        .blok {
            width: 100px;
            height: 20px;
            background-color: gray;
            border-radius: 12px;
        }

        .active {
            background-color: green;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand  navbar-light" style=" background-color:#E36414; position: fixed; width: 100%;">
            <!-- Left navbar links -->


            <div class="col-6 ml-5">
                <marquee direction="left" scrollamount="4" class="text-white" align="center">Selamat Datang {{session()->get('name')}} di TOKOTO WEB</marquee>
            </div>

            <!-- Right navbar links -->
            <ul class="navbar-nav" style="display: flex; width: 100%; justify-content: center;">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a type="button" class="nav-link text-white" data-toggle="modal" data-target="#tambah-data-viewIndex">
                        <i class="fas fa-arrow-right mr-1"></i> Keluar
                    </a>


                </li>


            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-white-primary elevation-2" style="position: fixed;">
            <!-- Brand Logo -->
            <div class="  pb-3  " style="
              width: auto;
            padding-top: 10px;
             display: flex;
            align-items: center;
             justify-content: center;
            flex-direction: column;
                          background-color:#E36414;
                      ">



                <img style="width: 100px;" src="{{asset('images/logo-kantor.png')}}" alt="">





                <div class="col-11 text-center text-white text-bold">

                    TOKOTO WEB
                </div>



            </div>

            <div class="sidebar">




                <!-- Sidebar Menu -->
                <nav class="mt-1">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


                        <li class="nav-item ">
                            <a href=" /" class="nav-link {{(request()->is('/')?'bg-secondary':'')}}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    BERANDA

                                </p>
                            </a>
                        </li>


                        <li class="nav-item ">
                            <a href="/product/index" class="nav-link {{(request()->is('product/*')?'bg-secondary':'')}}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    DATA PRODUCT

                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/customer/index" class="nav-link {{(request()->is('customer/*')?'bg-secondary':'')}}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    DATA CUSTOMER

                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/transaction-detail/index" class="nav-link {{(request()->is('transaction-detail/*')?'bg-secondary':'')}}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    DATA TRANSACTION

                                </p>
                            </a>
                        </li>







                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">

                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid ">
                    @yield('content')


                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->

            <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
                <i class="fas fa-chevron-up"></i>
            </a>
        </div>
        <!-- /.content-wrapper -->
        <div class="modal fade" id="tambah-data-viewIndex">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Apakah Anda Yakin Ingin Keluar?</h4>

                    </div>



                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="/logout" class="btn btn-danger">Keluar</a>
                    </div>


                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
        <footer class="main-footer">
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>

    <!-- Bootstrap 4 -->

    <!-- AdminLTE App -->

    <!-- AdminLTE for demo purposes -->

    <!-- AdminLTE for demo purposes -->
    <script>
        document.getElementById('foto_ktp').addEventListener('change', function(event) {
            const fileInput = event.target;
            console.log(fileInput)
            const imagePreview = document.getElementById('foto_ktp_view');

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        });
        document.getElementById('foto_kk').addEventListener('change', function(event) {
            const fileInput = event.target;
            const imagePreview = document.getElementById('foto_kk_view');

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        });
        document.getElementById('foto_ktp_edit').addEventListener('change', function(event) {
            const fileInput = event.target;
            console.log(fileInput)
            const imagePreview = document.getElementById('foto_ktp_edit_view');

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        });
        document.getElementById('foto_kk_edit').addEventListener('change', function(event) {
            const fileInput = event.target;
            const imagePreview = document.getElementById('foto_kk_edit_view');

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        });
    </script>
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>