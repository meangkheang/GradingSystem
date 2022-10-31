<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class="antialiased bg-gradient-to-br from-blue-100 to-white">
    <div class="container px-6 mx-auto">
        <div class="flex text-center h-screen justify-evenly items-center">
            <div class="w-full md:w-2/3 lg:w-1/2 mx-auto md:mx-0">

                @if (session()->has('message'))
                    <div>
                        <h1 class="px-4 py-2 rounded bg-red-600 text-white">{{ session('message') }}</h1>
                    </div>
                @endif
               

                <div class="bg-white p-10 flex flex-col w-full shadow-xl rounded-xl">

                    <h2 class="flex items-center text-2xl font-bold text-gray-800 text-left mb-5">
                        <a href="/">Home </a>

                        / Login
                    </h2>
                    <form action="/login" class="w-full" method="POST">
                        @csrf

                        <div id="input" class="flex flex-col w-full my-5">
                            <label for="username" class="text-gray-500 mb-2 text-left">Email</label>
                            <input type="email" name="email" id="username" placeholder="Please insert your username"
                                class="appearance-none border-2 border-gray-100 rounded-lg px-4 py-3 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:shadow-lg" />
                        </div>
                        <div id="input" class="flex flex-col w-full my-5">
                            <label for="password" class="text-gray-500 mb-2 text-left">Password</label>
                            <input type="password" name="password" id="password" placeholder="Please insert your password"
                                class="appearance-none border-2 border-gray-100 rounded-lg px-4 py-3 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:shadow-lg" />
                        </div>
                        <div id="button" class="flex flex-col w-full my-5">
                            <button type="submit"
                                class="w-full py-4 bg-blue-500 rounded-lg text-white hover:bg-blue-600 hover:ring-black hover:ring-2">
                                
                                Sign in

                            </button>
                            <div class="flex justify-evenly mt-5">
                                <a href="/register"
                                    class="w-full text-center font-medium text-gray-500 hover:underline">Sign Up!</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
