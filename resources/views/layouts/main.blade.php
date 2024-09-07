<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Movie App</title>
    @livewireStyles
</head>

<body class="font-sans bg-gray-900 text-white">

    <nav class="border-b border-gray-800">
        <div class="container mx-auto flex px-4 md:flex-row items-center justify-between px-4 py-4 ">
            <!-- Nav kiri -->
            <ul class="flex flex-col md:flex-row items-center ml-20">
                <li>
                    <a href="{{ route('movies.dashboard')}}">
                        <i class='bx bxs-camera-movie'></i> MoviesApp
                    </a>
                </li>
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="{{ route('movies.dashboard')}}" class="hover:text-gray-300">Movies</a>
                </li>
                <li class="md:ml-8 mt-3 md:mt-0">
                    <a href="{{ route('tv.dashboard')}}" class="hover:text-gray-300">TV Shows</a>
                </li>
                <li class="md:ml-8 mt-3 md:mt-0">
                    <a href="{{ route('actors.dashboard')}}" class="hover:text-gray-300">Actors</a>
                </li>
            </ul>
            <!-- Nav kanan -->
            <div class="flex flex-col md:flex-row items-center mr-20">
                <livewire:search-dropdown />
                <div class="md:ml-4 mt-1 md:ml-0">
                    <a href="#">
                        <i class='bx bxs-user-circle' style='color:#ffffff; font-size:30px;'></i>
                    </a>
                </div>
            </div>
        </div> 
    </nav>

    @yield('content')
    
    @livewireScripts
</body>
</html>