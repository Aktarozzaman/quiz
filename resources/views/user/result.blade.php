{{--
<!DOCTYPE html>
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

    @include('user.partials.css')


</head>

<body id="page-top">
    {{-- id="page-top" --}}

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- End of Sidebar -->
        {{-- @include('user.partials.sidebar') --}}
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('user.partials.topbar')
                <!-- End of Topbar -->




                {{-- Error message --}}
                @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div id="content">

                    <div class="container">
                        {{-- success --}}
                        @if (session()->has('SUCCESS_MESSAGE'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ session()->get('SUCCESS_MESSAGE') }}
                        </div>
                        @endif
                        <h1>Quiz Result</h1>
                        <p>Your score: {{ $score }} out of {{ $questions->count() }}</p>
                    </div>
                    <!-- End of Main Content -->

                    <!-- Footer -->
                    @include('user.partials.footer')
                    <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->
            @include('user.partials.script')

</body>

</html>