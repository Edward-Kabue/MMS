<!-- home blade layout component -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <div class="min-h-screen bg-gray-100">
        <header class="bg-white shadow">
            <div class="container mx-auto px-4 py-6">
                <nav class="flex justify-between items-center">
                    <a href="/" class="text-xl font-bold text-gray-800">Consulting Co.</a>
                    <nav>
                        <ul class="flex space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <li><a href="#" class="text-gray-600 hover:text-gray-800">Home</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-gray-800">Services</a></li>
                            <li><a href="{{ route('tasks.index') }}" class="text-gray-600 hover:text-gray-800">Blog</a>
                            </li>
                            <li><a href="#" class="text-gray-600 hover:text-gray-800">Contact</a></li>
                        </ul>
                    </nav>
                </nav>
            </div>
        </header>


        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto px-4">
            <p class="text-center">&copy; 2022 Consulting Co. All rights reserved.</p>
        </div>
    </footer>


</body>

</html>
