@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto py-16 flex flex-col md:flex-row" style="padding-left:97px; padding-right:97px">
            <div class="flex-none">
                <img src="{{$actor['profile_path']}}" alt="Actor" class="w-64 md:w-96" style="width:20rem">
                <div class="flex item-center mt-4 gap-3">
                    @if ($social['facebook'])
                        <a href="{{$social['facebook']}}">
                            <i class='bx bxl-facebook-square -ml-2 hover:opacity-75' style='color:orange; margin-top:3.5px; font-size:200%'></i>
                        </a>
                    @endif
                    @if ($social['instagram'])
                        <a href="{{$social['instagram']}}">
                            <i class='bx bxl-instagram hover:opacity-75' style='color:orange; margin-top:3.5px; font-size:200%'></i>
                        </a>
                    @endif
                    @if ($social['twitter'])
                        <a href="{{$social['twitter']}}">
                            <i class='bx bxl-twitter hover:opacity-75' style='color:orange; margin-top:3.5px; font-size:200%'></i>
                        </a>
                    @endif
                    @if ($actor['homepage'])
                        <a href="{{$actor['homepage']}}">
                            <i class='bx bx-world hover:opacity-75' style='color:orange; margin-top:3.5px; font-size:200%'></i>
                        </a>
                    @endif
                </div>
            </div>      

            <div class="md:ml-24">

                <h2 class="text-4xl font-semibold">{{$actor['name']}}</h2>
                <div class="flex flex-wrap item-center text-gray-400 text-sm mt-1">
                    <i class='bx bxs-cake' style='color:orange; margin-top:3.5px'></i>
                    <span class="ml-2">{{$actor['birthday']}} ({{$actor['age']}} years old) in {{$actor['place_of_birth']}}</span>
                </div>

                <p class="text-gray-300 mt-8">
                    {{$actor['biography']}}
                </p>

                <h5 class="mt-8 font-semibold">Known for</h5>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
                    @foreach ($knownForMovies as $movie)
                        <div class="mt-4">
                            <a href="{{route('movies.detail', $movie['id'])}}">
                                <img src="{{$movie['poster_path']}}" alt="" class="hover:opacity-75">
                            </a>
                            <a href="{{route('movies.detail', $movie['id'])}}" class="text-sm leading-noemal block text-gray-400 hover:text-white mt-1">{{$movie['title']}}</a>
                        </div>
                    @endforeach
                    
                </div>

        </div>
    </div>


    <!-- Cast -->

    <div class="credits border-b border-gray-800 pb-16" style="padding-left:97px; padding-right:97px">
        <div class="container mx-auto py-16" >
            <h2 class="text-4xl font-semibold" >
                Credits 
            </h2>
            <ul class="list-disc leading-loose pl-5 mt-8">
                @foreach ($credits as $credit)
                    <li>{{ $credit['release_year'] }} &middot; <strong>{{ $credit['title'] }}</strong> as {{ $credit['character'] }}</li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection