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
                    <form class="space-y-4 md:space-y-6" action="{{ route('quizquestion.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="quiz_id" value="{{ $quizzes }}">

                        <label for="category">Select Category:</label>
                        <select name="category" id="category">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id}}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        @php
                        $questionNumber = 1; // Initialize the question number
                        @endphp

                        @foreach ($categories as $category)

                        <div id="category-{{ $category->id }}" class="category-questions" style="display: none;">
                            @php
                            $categoryQuestions = $questions->where('category_id', $category->id);
                            @endphp
                            @foreach ($categoryQuestions as $question)
                            <div class="question">
                                <div class="question-header">
                                    <input type="checkbox" name="selected_questions[]" value="{{ $question->id }}">
                                    {{ $questionNumber++ }}.{{ $question->title }}
                                </div>
                                <div>
                                    <a class="text-blue-600" href="{{ route('options.edit', $question->id) }}">Edit</a>
                                </div>
                                <div class="options">
                                    @foreach ($question->options as $option)
                                    <div class="option">
                                        <input type="checkbox" name="question_{{ $question->id }}[]"
                                            value="{{ $option->id }}" {{ $option->is_correct ? 'checked' : '' }}>
                                        <label>{{ $option->name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach

                        <button type="submit"
                            class="w-500 text-black bg-green-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Create
                            Quiz</button>

                        <script>
                            const categorySelect = document.getElementById('category');
                        const categoryQuestions = document.querySelectorAll('.category-questions');
                
                        categorySelect.addEventListener('change', function() {
                            const selectedCategoryId = this.value;
                
                            categoryQuestions.forEach(function(category) {
                                if (category.id === 'category-' + selectedCategoryId) {
                                    category.style.display = 'block';
                                } else {
                                    category.style.display = 'none';
                                }
                            });
                        });
                        </script>
                    </form>

                    <!-- /.container-fluid -->
                </body>

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