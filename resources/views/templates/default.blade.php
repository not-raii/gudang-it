@extends('layouts/head')
@include('layouts/logout')


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            @include('layouts/sidebarAdmin')
               
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    @include('layouts/topbar')

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @if (session('success'))
                        <div class="alert alert-success my-3 mr-auto" role="alert">Selamat Datang di Gudang IT, {{ session('success') }}</div>
                    @endif

                    @yield('content')

                </div>
            <!-- End of Main Content -->

            @include('layouts/footer')
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    @include('layouts/bottom')

</body>
</html>