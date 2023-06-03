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

                    <section class="bg-gray-50 dark:bg-gray-900">
                        <div class="flex flex-col items-center justify-center px-3 py-3 mx-auto md:h-screen lg:py-0">

                            <div
                                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                                <div class="p-6 space-y-4 md:space-y-2 sm:p-8">
                                    <form class="space-y-4 md:space-y-6" action="{{ route('quiz.store') }}"
                                        method="post">
                                        @csrf
                                        <div>
                                            <div>
                                                <label for="title"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Select Category:
                                                </label>
                                                <div class="relative">
                                                    <select name="category_id" required
                                                        class="appearance-none bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full py-2.5 pl-3 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option value="" disabled selected>Select a category
                                                        </option>
                                                        @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->name }}
                                                            @endforeach

                                                        </option>

                                                    </select>
                                                   

                                                </div>
                                                @error('category_id')
                                                <p class="mb-4 text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>



                                            <div>
                                                <label for="title"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Quiz Title
                                                    </label>
                                                <input value="{{ old('title') }}" type="text" name="title"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Question Name" required>
                                                @error('title')
                                                <p class="mb-4 text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div>
                                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Quiz Time
                                                </label>
                                                <input value="{{ old('quiz_time') }}" type="number" name="quiz_time"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Quiz Time in minute" required>
                                                @error('title')
                                                <p class="mb-4 text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>


                                        </div>



                                        <button type="submit"
                                            class="w-full text-black bg-green-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Create
                                            Quiz
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