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

                <div>
                    {{-- success --}}
                    @if (session()->has('SUCCESS_MESSAGE'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ session()->get('SUCCESS_MESSAGE') }}
                        </div>
                    @endif
                    <div class="flex justify-between mx-12 my-4">
                        <h2 class="text-gray-800 text-2xl ">{{ $title ?? '' }}</h2>
                        <a class="px-3 py-2 bg-green-400 rounded-md" href="{{ route('questions.create') }}">Create New
                            Question</a>
                    
                    </div>
                    <div class="mx-12 my-4 ">
                        <table class="border-separate border border-slate-400  w-full">
                            <thead>
                                <tr>

                                    <th class="border border-slate-300 ...">Category</th>
                                    <th class="border border-slate-300 ...">Questions name</th>
                                    <th class="border border-slate-300 ...">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($questions as $question)
                            <tr>
                                <td class="border border-slate-300 ...">{{ $question->category->name }}</td>
                                <td class="border border-slate-300 ...">{{ $question->title }}</td>
                                <td class="border border-slate-300 ...">
                                    <a class="text-blue-600" href="{{ route('questions.edit', $question->id) }}">Edit</a>
                            
                                    <a class="text-red-600" href="{{ route('questions.destroy', $question->id) }}"
                                        onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this question?')) { document.getElementById('delete-form-{{ $question->id }}').submit(); }">
                                        Delete
                                    </a>
                            
                                    <form id="delete-form-{{ $question->id }}" action="{{ route('questions.destroy', $question->id) }}"
                                        method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{ $questions->links() }}
                    </div>

                </div>

                <!-- Begin Page Content -->
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
