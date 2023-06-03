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



           <body>
                    {{-- success --}}
                    @if (session()->has('SUCCESS_MESSAGE'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('SUCCESS_MESSAGE') }}
                    </div>
                    @endif
                    <section class="bg-gray-50 dark:bg-gray-900">
                        <div class="flex flex-col items-center justify-center px-3 py-3 mx-auto md:h-screen lg:py-0">
                         

                            <div
                                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                                <div class="p-6 space-y-4 md:space-y-2 sm:p-8">
                                    <label> </label>
                                    <form class="space-y-4 md:space-y-6" action="{{ route('options.store') }}" method="POST">
                                        @csrf
                                    
                                        <div>
                                            <label  for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Question Name : {{ $questions->title }}
                                            </label>
                                            <input name="question_id" type="hidden" value="{{ $questions->id }}">
                                        </div>
                                    
                                        <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">

                                            <ul>
                                                @for ($i = 1; $i <= 4; $i++) <li>
                                                    <input type="text" name="options[]" placeholder="Option {{ $i }}">
                                                    <input type="radio" name="correct_answer" value="{{ $i }}"> Correct
                                                    </li>
                                                    @endfor
                                            </ul>

                                        </div>
                                    
                                        <button type="submit"
                                            class="w-full text-black bg-green-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                            Submit
                                        </button>
                                    </form>
                                    

                                </div>
                            </div>
                        </div>
                    </section>

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




