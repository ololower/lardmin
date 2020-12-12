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
                @include('lardmin::layout.breadcrumbs')
                <div class="lg:flex justify-between items-center mb-6"><p class="text-2xl font-semibold mb-2 lg:mb-0">
                        Good afternoon, Joe!</p>
                    <button
                        class="bg-blue-500 hover:bg-blue-600 focus:outline-none rounded-lg px-6 py-2 text-white font-semibold shadow">
                        Добавить
                    </button>
                </div>

                <div id="content" >

                    @yield('content')


{{--                <div class="flex flex-wrap -mx-3">--}}
{{--                    <div class="w-full xl:w-1/3 px-3"><p class="text-xl font-semibold mb-4">Recent Sales</p>--}}
{{--                        <div class="w-full bg-white border rounded-lg p-4 mb-8 xl:mb-0">--}}
{{--                            <div class="chartjs-size-monitor">--}}
{{--                                <div class="chartjs-size-monitor-expand">--}}
{{--                                    <div class=""></div>--}}
{{--                                </div>--}}
{{--                                <div class="chartjs-size-monitor-shrink">--}}
{{--                                    <div class=""></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <canvas id="buyers-chart" width="609" height="406" class="chartjs-render-monitor"--}}
{{--                                    style="display: block; height: 254px; width: 381px;"></canvas>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="w-full xl:w-1/3 px-3"><p class="text-xl font-semibold mb-4">Recent Reviews</p>--}}
{{--                        <div class="w-full bg-white border rounded-lg p-4 mb-8 xl:mb-0">--}}
{{--                            <div class="chartjs-size-monitor">--}}
{{--                                <div class="chartjs-size-monitor-expand">--}}
{{--                                    <div class=""></div>--}}
{{--                                </div>--}}
{{--                                <div class="chartjs-size-monitor-shrink">--}}
{{--                                    <div class=""></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <canvas id="reviews-chart" width="609" height="406" class="chartjs-render-monitor"--}}
{{--                                    style="display: block; height: 254px; width: 381px;"></canvas>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="w-full xl:w-1/3 px-3"><p class="text-xl font-semibold mb-4">Recent Transactions</p>--}}
{{--                        <div class="w-full bg-white border rounded-lg p-4">--}}
{{--                            <div--}}
{{--                                class="w-full bg-gray-100 border rounded-lg flex justify-between items-center px-4 py-2 mb-4">--}}
{{--                                <div><p class="font-semibold text-xl">Trent Murphy</p>--}}
{{--                                    <p>Product 1</p></div>--}}
{{--                                <span class="text-green-500 font-semibold text-lg">$25.00</span></div>--}}
{{--                            <div--}}
{{--                                class="w-full bg-gray-100 border rounded-lg flex justify-between items-center px-4 py-2 mb-4">--}}
{{--                                <div><p class="font-semibold text-xl">Joseph Brent</p>--}}
{{--                                    <p>Product 34</p></div>--}}
{{--                                <span class="text-red-500 font-semibold text-lg">$74.99</span></div>--}}
{{--                            <div--}}
{{--                                class="w-full bg-gray-100 border rounded-lg flex justify-between items-center px-4 py-2 mb-4">--}}
{{--                                <div><p class="font-semibold text-xl">Jacob Bator</p>--}}
{{--                                    <p>Product 23</p></div>--}}
{{--                                <span class="text-green-500 font-semibold text-lg">$14.95</span></div>--}}
{{--                            <div--}}
{{--                                class="w-full bg-gray-100 border rounded-lg flex justify-between items-center px-4 py-2">--}}
{{--                                <div><p class="font-semibold text-xl">Alex Mason</p>--}}
{{--                                    <p>Product 66</p></div>--}}
{{--                                <span class="text-green-500 font-semibold text-lg">$44.99</span></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
        <div class="w-full border-t-2 px-8 py-6 lg:flex justify-between items-center"><p class="mb-2 lg:mb-0">©
                Copyright 2020</p>
            <div class="flex"><a href="#" class="mr-6 hover:text-gray-900">Terms of Service</a><a href="#"
                                                                                                  class="mr-6 hover:text-gray-900">Privacy
                    Policy</a><a href="#" class="hover:text-gray-900">About Us</a></div>
        </div>
    </div>
</div>

</body>
</html>
