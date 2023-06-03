<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? '' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>


    <div class="px-6 py-4 text-right">
        <a class="text-blue-600" href="{{route('signin')}}">Signin</a>
        <a class="text-blue-600" href="{{route('signup')}}">SignUp</a>
    </div>




    <div>
        <p class="text-center"> Quiz test</p>
    </div>

</body>

</html>