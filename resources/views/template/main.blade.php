<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Lentera Fajar Indonesia</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/admin/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="/admin/vendors/DataTables/datatables.min.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="/admin/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="/admin/css/main.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha512-3P8rXCuGJdNZOnUx/03c1jOTnMn3rP63nBip5gOP2qmUh5YAdVAvFZ1E+QLZZbC1rtMrQb+mah3AfYW11RUrWA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- PAGE LEVEL STYLES-->
    @stack('style')
    <!-- @livewireStyles -->
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        @yield('container')
    </div>
    <!-- BEGIN THEME CONFIG PANEL-->
    {{-- <div class="theme-config">
        <div class="theme-config-toggle"><i class="fa fa-cog theme-config-show"></i><i
                class="ti-close theme-config-close"></i>
        </div>
        <div class="theme-config-box">
            <div class="text-center font-18 m-b-20">SETTINGS</div>
            <div class="font-strong">LAYOUT OPTIONS</div>
            <div class="check-list m-b-20 m-t-10">
                <label class="ui-checkbox ui-checkbox-gray">
                    <input id="_fixedNavbar" type="checkbox" checked>
                    <span class="input-span"></span>Fixed navbar</label>
                <label class="ui-checkbox ui-checkbox-gray">
                    <input id="_fixedlayout" type="checkbox">
                    <span class="input-span"></span>Fixed layout</label>
                <label class="ui-checkbox ui-checkbox-gray">
                    <input class="js-sidebar-toggler" type="checkbox">
                    <span class="input-span"></span>Collapse sidebar</label>
            </div>
            <div class="font-strong">LAYOUT STYLE</div>
            <div class="m-t-10">
                <label class="ui-radio ui-radio-gray m-r-10">
                    <input type="radio" name="layout-style" value="" checked="">
                    <span class="input-span"></span>Fluid</label>
                <label class="ui-radio ui-radio-gray">
                    <input type="radio" name="layout-style" value="1">
                    <span class="input-span"></span>Boxed</label>
            </div>
        </div>
    </div> --}}
    <!-- END THEME CONFIG PANEL-->
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->

    <!-- jQuery library -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script> -->
    <!-- Latest compiled JavaScript -->
    <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

    <script src="/admin/vendors/jquery/dist/jquery.min.js"></script>
    <script src="/admin/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="/admin/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/admin/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
    <script src="/admin/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="/admin/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
    <script src="/admin/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
    <script src="/admin/vendors/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <script src="/admin/vendors/jvectormap/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="/admin/js/app.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="/admin/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="/admin/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#example-table').DataTable({
                pageLength: 10,
                scrollX: true
            });
        })
    </script>
    <script type="text/javascript">
        $(function() {
            $('#tipe-peker-table').DataTable({
                pageLength: 10,
                scrollX: true
            });
        })
    </script>
    <script type="text/javascript">
        $(function() {
            $('#kategori-table').DataTable({
                pageLength: 10,
                scrollX: true
            });
        })
    </script>
    {{-- menu keterangan nilai --}}
    <script type="text/javascript">
        $(function() {
            $('#tabel-ketnilai').DataTable({
                pageLength: 10,
                scrollX: true
            });
        })
    </script>
    {{-- menu kriteria --}}
    <script type="text/javascript">
        $(function() {
            $('#table-kriteria').DataTable({
                pageLength: 10,
                scrollX: true
            });
        })
    </script>
    <script type="text/javascript">
        $(function() {
            $('#table-indikator').DataTable({
                pageLength: 10,
                scrollX: true
            });
        })
    </script>

    <script type="text/javascript">
        $(function() {
            $('#table-pertanyaan').DataTable({
                pageLength: 10,
                scrollX: true
            });
        })
    </script>

    <script type="text/javascript">
        $(function() {
            $('#tabel-guru').DataTable({
                pageLength: 10,
                scrollX: true
            });
        })
    </script>
    
    <script type="text/javascript">
        $(function() {
            $('#table-haluser').DataTable({
                pageLength: 10,
                scrollX: true
            });
        })
    </script>


    <script type="text/javascript">
        $(function() {
            $('#zero_config').DataTable({
                pageLength: 10,
                scrollX: true
            });
        })
        //
    </script>
    <script type="text/javascript">
        //     $(function() {
        //         // .dataTable = " . " itu buat menandakan untuk CLASS ; " dataTable " itu buat menandakan nama CLASS nya
        //         $('.dataTable').DataTable({
        //             pageLength: 10,
        //             scrollX: true
        //         });
        //     })
        //
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
    <!-- @livewireScripts -->
</body>

</html>
