<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('lardmin/css/admin.css') }}" rel="stylesheet"/>
</head>
<body>

<div class="flex flex-wrap">
    <div id="main-nav"
         class="w-1/2 md:w-1/3 lg:w-64 fixed md:top-0 md:left-0 h-screen lg:block bg-gray-100 border-r z-30 hidden">
        @include('lardmin::layout.logo')
        @include('lardmin::layout.left-menu')
    </div>
    <div id="main-content" class="w-full bg-gray-100 pl-0 lg:pl-64 min-h-screen">

        @include('lardmin::layout.main-content-heading')

        <div class="p-6 bg-gray-100 mb-20">

            <div id="home">
                @yield('content')
            </div>

            <div class="w-full border-t-2 px-8 py-6 lg:flex justify-between items-center">
                <p class="mb-2 lg:mb-0">© Copyright 2020</p>
                <div class="flex">
                    <a href="#" class="mr-6 hover:text-gray-900">Terms of Service</a>
                    <a href="#" class="mr-6 hover:text-gray-900">Privacy Policy</a>
                    <a href="#" class="hover:text-gray-900">About Us</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
