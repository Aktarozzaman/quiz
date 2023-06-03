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
                @include('admin.partials.customcss')
                <!-- End of Topbar -->

                <div>
                    {{-- success --}}
                    @if (session()->has('SUCCESS_MESSAGE'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('SUCCESS_MESSAGE') }}
                    </div>
                    @endif
                    <div class="flex justify-between mx-12 my-2">
                        <h2 class="text-gray-800 text-2xl ">{{ $title ?? '' }}</h2>

                    </div>

                    

                </div>

                <!-- Begin Page Content -->
               <body>
                <h1>Question List</h1>
            @php
            $questionNumber = 1; // Initialize the question number
            @endphp
                @foreach ($questions as $question)
                <div class="question">
                    <div class="question-header">{{ $questionNumber++ }}.{{ $question->title }}</div>
                    <div>
                        <a class="text-blue-600" href="{{ route('options.edit',$question->id)}}">Edit</a>
                    </div>
                    <div class="options">
                        @foreach ($question->options as $option)
                        <div class="option">
                            <input type="checkbox" name="question_{{ $question->id }}" value="{{ $option->id }}" {{ $option->is_correct ? 'checked' : '' }}>
                            <label>{{ $option->name }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
              
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










