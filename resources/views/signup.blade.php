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

                <div class="bg-white p-10 flex flex-col w-full shadow-xl rounded-xl">

                    <h2 class="flex items-center text-2xl font-bold text-gray-800 text-left mb-5">
                        SignUp
                    </h2>
                    <form action="" class="w-full">
                        <div id="input" class="flex flex-col w-full my-5">
                            <label for="username" class="text-gray-500 mb-2 text-left">Username</label>
                            <input type="text" id="username" placeholder="Please insert your username"
                                class="appearance-none border-2 border-gray-100 rounded-lg px-4 py-3 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:shadow-lg" />
                        </div>
                        <div id="input" class="flex flex-col w-full my-5">
                            <label for="password" class="text-gray-500 mb-2 text-left">Password</label>
                            <input type="password" id="password" placeholder="Please insert your password"
                                class="appearance-none border-2 border-gray-100 rounded-lg px-4 py-3 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:shadow-lg" />
                        </div>
                        <div id="input" class="flex flex-col w-full my-5">
                            <label for="password" class="text-gray-500 mb-2 text-left">Comfirm Password</label>
                            <input type="password" id="password" placeholder="Please insert your password"
                                class="appearance-none border-2 border-gray-100 rounded-lg px-4 py-3 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:shadow-lg" />
                        </div>
                        <div id="button" class="flex flex-col w-full my-5">
                            <button type="button"
                                class="w-full py-4 bg-blue-500 rounded-lg text-white hover:bg-blue-600 hover:ring-black hover:ring-2">
                                <div class="flex flex-row items-center justify-center">
                                    <div class="mr-2">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="font-bold">Sign Up</div>
                                </div>
                            </button>
                            <div class="flex justify-evenly mt-5">
                                <a href="/login"
                                    class="w-full text-center font-medium text-gray-500 hover:underline">Login!</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
