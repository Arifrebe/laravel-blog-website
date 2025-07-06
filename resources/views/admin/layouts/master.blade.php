<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BlogkuAdmin | @yield('title', 'web title')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('asset-admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('asset-admin/dist/css/adminlte.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('asset-admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset-admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset-admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('asset-admin/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Font Awesome Newer-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap Toggle CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('asset-admin/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Tags css -->
    <link rel="stylesheet" href="{{ asset('amsify/amsify.suggestags.css') }}">

    @stack('style')
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('admin.layouts.navbar')

        <!-- /.navbar -->
        @include('admin.layouts.aside')

        <!-- Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>@yield('title')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            </ol>                            
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('asset-admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('asset-admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('asset-admin/dist/js/adminlte.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('asset-admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('asset-admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('asset-admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('asset-admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('asset-admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('asset-admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('asset-admin/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('asset-admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('asset-admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('asset-admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('asset-admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('asset-admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Bootstrap Toggle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <!-- Summernote -->
    <script src="{{ asset('asset-admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
     <!-- Amsify -->
    <script src="{{ asset('amsify/jquery.amsify.suggestags.js') }}"></script>
    
    <script>
      $('input[name="tags"]').amsifySuggestags();
    </script>

    <script>      
        $(document).ready(function() {
            $('#datatable').DataTable({
                paging: true,
                lengthChange: false,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: true,
                language: {
                    url: "{{ asset('asset-admin/plugins/datatables/i18n/id.json') }}"
                }
            });

            $('#datatableWithoutPagination').DataTable({
                paging: false,
                lengthChange: false,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: true,
                language: {
                    url: "{{ asset('asset-admin/plugins/datatables/i18n/id.json') }}"
                }
            });
        });
    
        // Configure and display Toastr notifications for Laravel session messages
        toastr.options = {
            "progressBar": true,  
            "closeButton": true,  
        }

        @if(Session::has('success') || Session::has('info') || Session::has('error'))
            @foreach(['success', 'info', 'error'] as $type)
                @if(Session::has($type))
                    toastr.{{ $type }}("{!! addslashes(Session::get($type)) !!}");
                @endif
            @endforeach
        @endif
    
        // Confirmation function using SweetAlert before deleting or performing critical actions
        function confirmation(ev, message = "Ini akan dihapus permanen") {
            ev.preventDefault();  
            let target = ev.currentTarget;
            let urlToRedirect = target.tagName === 'FORM' ? target.action : target.href;
    
            swal({
                title: "Apa kamu yakin?",
                text: message,
                icon: "warning",
                buttons: ["Batal", "Ya, Lanjutkan"],
                dangerMode: true,
            }).then((willConfirm) => {
                if (willConfirm) {
                    if (target.tagName === 'FORM') {
                        target.submit();
                    } else {
                        window.location.href = urlToRedirect;
                    }
                }
            });
        }

        // Initialize Summernote text editor
        $('#summernote').summernote({ height: 300 });
    </script>    

    @stack('script')
</body>

</html>