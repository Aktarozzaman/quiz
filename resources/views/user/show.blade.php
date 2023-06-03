<!DOCTYPE html>
<html lang="en">

<head>

    @include('user.partials.css')


</head>

<body id="page-top">

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
                @include('user.partials.customcss')
                <!-- End of Topbar -->


                <!-- Begin Page Content -->


                {{-- Error message --}}
                @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="container">
                    <h1>Quiz</h1>
                
                    {{-- success --}}
                    @if (session()->has('SUCCESS_MESSAGE'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('SUCCESS_MESSAGE') }}
                    </div>
                    @endif
                
                    <div class="flex justify-between mx-12 my-2">
                        <h2 class="text-gray-800 text-2xl">{{ $title ?? '' }}</h2>
                        <h3 class="text-gray-800 text-xl"> Total {{ $questions->count() }} Questions</h3> {{-- Display the question
                        count --}}
                        {{-- Countdown Timer --}}
                        <div class="text-gray-800 text-xl" id="timer">
                            <label>Time:<span id="minutes">{{ floor($duration / 60) }}</span>:<span id="seconds">{{ $duration % 60
                                    }}</span></label>
                        </div>
                    </div>
                
                    @if ($questions->count() > 0)
                    <form id="quiz-form" action="{{ route('quiz.submit') }}" method="post">
                        @csrf
                        <input type="hidden" name="quiz_id" value="{{ $quiz_id }}">
                    
                        @foreach ($questions as $index => $question)
                        <div class="question">
                            <h3>Question {{ $index + 1 }}: {{ $question->title }}</h3>
                            <ul>
                                @foreach ($question->options as $option)
                                <li>
                                    <input style="margin-left: 50px" type="radio" name="answers[{{ $question->id }}]"
                                        value="{{ $option->id }}">
                                    <label>{{ $option->name }}</label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endforeach
                    
                        <button type="submit" id="quiz_form" class="btn btn-primary">Submit Quiz</button>
                    </form>
                    @else
                    <p>No questions available for this quiz.</p>
                    @endif
                    </div>
                    
                    <script>
                        var minutesLabel = document.getElementById("minutes");
                        var secondsLabel = document.getElementById("seconds");
                        var totalSeconds = {{ $duration }}; // Set the total duration of the quiz in seconds
                    
                        setInterval(setTime, 1000);
                    
                        function setTime() {
                            --totalSeconds;
                            var minutes = Math.floor(totalSeconds / 60);
                            var seconds = totalSeconds % 60;
                    
                            minutesLabel.innerHTML = pad(minutes);
                            secondsLabel.innerHTML = pad(seconds);
                    
                            if (totalSeconds <= 0) {
                                // Submit the quiz automatically when the timer reaches 0
                                document.getElementById('quiz-form').submit();
                            }
                        }
                    
                        function pad(val) {
                            var valString = val + "";
                            if (valString.length < 2) {
                                return "0" + valString;
                            } else {
                                return valString;
                            }
                        }
                    </script>





            </div>

            <!-- End of Main Content -->

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    @include('user.partials.script')

</body>

</html>