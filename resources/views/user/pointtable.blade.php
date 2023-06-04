<!DOCTYPE html>
<html lang="en">

<head>

    @include('user.partials.css')


</head>

<body id="page-top">
    {{-- id="page-top" --}}

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('user.partials.topbar')
                <!-- End of Topbar -->

                <div>
                    {{-- success --}}
                    @if (session()->has('SUCCESS_MESSAGE'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('SUCCESS_MESSAGE') }}
                    </div>
                    @endif
<div class="container">
                        <h1>Quiz Points</h1>
                        @if ($quizPoints->isEmpty())
                        <p>No quiz points available.</p>
                        @else
                        <table class="table">
                            <thead>
                                <tr>

<th>Quiz Name</th>
                                    <th>Points</th>
                                    <th>Total Questions</th>
                                </tr>
                            </thead>
                            <tbody>
@foreach ($quizPoints as $quizPoint)
<tr>

<td>{{ $quizPoint->quiz->name }}</td>
                                    <td>{{ $quizPoint->points }}</td>
                                    <td>{{ $quizPoint->total_question }}</td>
                                </tr>
@endforeach
                            </tbody>
                        </table>
@endif
                    </div>

                </div>

                <!-- Begin Page Content -->
                @yield('content')
                <!-- /.container-fluid -->

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