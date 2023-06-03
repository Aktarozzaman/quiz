{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title ?? ''}}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('styles')
    

</head>

<body>
@extends('admin.partials.sidebar')
{{-- @include('layouts.includes.nav') --}}
{{-- @yield('content')
@yield('scripts')
</body>

</html> --}}
<!DOCTYPE html>
<html lang="en">

<head>

    @include('admin.partials.css')


</head>

<body id="page-top">
    {{-- id="page-top" --}}

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.partials.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('admin.partials.topbar')
                <!-- End of Topbar -->

                {{-- body --}}
                {{-- @include('admin.admin_home') --}}


                @yield('content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('admin.partials.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    @include('admin.partials.script')

</body>

</html>
