<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Lardmin</title>
    <link href="{{ asset('lardmin/css/admin.css') }}" rel="stylesheet"/>
</head>
<body>

<div class="fixed mt-28 mx-4 md:mx-auto md:w-2/3 h-3/5 rounded-2xl shadow-xl bg-white md:bg-opacity-50 inset-x-0 ">
    <div class="flex h-full">

        <div class="w-full md:w-1/2 flex px-4 flex-col justify-center">
            <form action="">
                <p class="text-3xl text-center font-black mb-4">Регистрация</p>

                <div class="relative text-gray-700">
                    <input class="w-full h-10 pl-8 pr-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"
                           type="text"
                           placeholder="Email address"/>
                    <div class="absolute inset-y-0 left-0 flex items-center px-2 pointer-events-none">
                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M3 3h18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm17 4.238l-7.928 7.1L4 7.216V19h16V7.238zM4.511 5l7.55 6.662L19.502 5H4.511z"></path></svg>
                    </div>
                </div>

                <div class="relative text-gray-700 mt-4">
                    <input class="w-full h-10 pl-8 pr-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"
                           type="text"
                           placeholder="Email address"/>
                    <div class="absolute inset-y-0 left-0 flex items-center px-2 pointer-events-none">
                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M3 3h18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm17 4.238l-7.928 7.1L4 7.216V19h16V7.238zM4.511 5l7.55 6.662L19.502 5H4.511z"></path></svg>
                    </div>
                </div>

                <div class="relative text-gray-700 mt-4">
                    <input class="w-full h-10 pl-8 pr-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"
                           type="password"
                           placeholder="Password"/>
                    <div class="absolute inset-y-0 left-0 flex items-center px-2 pointer-events-none">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24" width="24" height="24"><path d="M6 8V7a6 6 0 1 1 12 0v1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h2zm13 2H5v10h14V10zm-8 5.732a2 2 0 1 1 2 0V18h-2v-2.268zM8 8h8V7a4 4 0 1 0-8 0v1z"></path></svg>
                    </div>
                </div>

                <div class="relative text-gray-700 mt-4">
                    <input class="w-full h-10 pl-8 pr-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"
                           type="password"
                           placeholder="Password"/>
                    <div class="absolute inset-y-0 left-0 flex items-center px-2 pointer-events-none">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24" width="24" height="24"><path d="M6 8V7a6 6 0 1 1 12 0v1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h2zm13 2H5v10h14V10zm-8 5.732a2 2 0 1 1 2 0V18h-2v-2.268zM8 8h8V7a4 4 0 1 0-8 0v1z"></path></svg>
                    </div>
                </div>

                <div class="pt-4">
                    <button class="w-full h-10 px-2 text-white transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-900">Зарегистрироваться</button>
                </div>

            </form>

        </div>

        <div class="hidden md:flex w-1/2  px-4 flex-col justify-center">
            <img src="https://upload.wikimedia.org/wikipedia/commons/c/c5/Corporate_Woman_Being_Stressed_at_Work.svg" alt="">
        </div>


    </div>
</div>
<div class="flex h-screen items-stretch">
    <div class="w-1/2 bg-blue-50"></div>
    <div class="w-1/2 bg-blue-400"></div>
</div>
</body>
</html>
