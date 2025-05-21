@include('inc.head')
<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-light ec-header-light" id="body">

	<!--  WRAPPER  -->
	<div class="wrapper">
        <!-- Sidebar  -->
        @include('inc.side-bar')
        <!-- End Sidebar  -->

       <!--  PAGE WRAPPER -->
		<div class="ec-page-wrapper">
            <!-- Topbar -->
            @include('inc.header')
            <!-- End Topbar -->

            <!-- Main Content -->
            @yield('content')
            <!-- End Main Content -->

            <!-- Footer -->
            @include('inc.footer')

            <!-- Footer -->
            @include('inc.footerjs')
            <!-- End Footer -->
            <!-- Global Response -->
            @include('inc.globalresponse')
        </div>
        // End Page Wrapper -->
    </div>