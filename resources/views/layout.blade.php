<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Grading and Evaluation System</title>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.4/dist/flowbite.min.css" />
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
    @livewireStyles()
</head>

<body>
    @include('components.navbar')
    @include('components.sidebar')
    <div class="flex overflow-hidden bg-white pt-16">
        <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
            <main>
                <div class="pt-6 px-4">
                    @yield('content')
                </div>
            </main>
            @include('components.footer')
        </div>
    </div>

    @livewireScripts()
</body>


</html>
