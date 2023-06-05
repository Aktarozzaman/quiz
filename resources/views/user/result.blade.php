
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
                        <p>Your score: {{ $score }} out of {{ $totalQuestions }}</p>
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
