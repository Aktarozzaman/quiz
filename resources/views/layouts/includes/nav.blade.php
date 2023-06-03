<div class="w-full flex justify-between">
<div class="px-6 py-4 text-right flex ">

</div >
    <div class="px-6 py-4 text-right flex justify-end">
        <a class="text-gray-600" href="{{ route('categories.index') }}">Categories</a>

        <a class="text-gray-600 mr-4" >{{ Auth()->user()->username }}</a>

        {{-- <a class="text-red-600" href="{{route('signout')}}">Logout</a> --}}
        <form action="{{route('signout')}}" method="post">
        @csrf
        <button class="text-red-600" type="submit">Sign out</button>
    </form>
    </div>
</div>