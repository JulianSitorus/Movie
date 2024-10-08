@extends('layouts.main')

@section('content')
    <div class="tv-info border-b border-gray-800">
        <div class="container mx-auto py-16 flex flex-col md:flex-row" style="padding-left:97px; padding-right:97px">
            <img src="{{$tvshow['poster_path']}}" alt="" class="w-64 md:w-96" style="width:20rem">
            <div class="md:ml-24">

                <h2 class="text-4xl font-semibold">{{$tvshow['name']}} ({{ \Carbon\carbon::parse($tvshow['first_air_date'])->format('Y')}})</h2>
                <h6 class="ml-0.5">{{$tvshow['tagline']}}</h6>
                <div class="flex flex-wrap item-center text-gray-400 text-sm mt-1">
                    <i class='bx bxs-star' style='color:orange; margin-top:3px'></i>
                    <span class="ml-1">{{ $tvshow['vote_average'] }}%</span>
                    <span class="mx-2">|</span>
                    <span>{{ $tvshow['first_air_date']}}</span>
                    <span class="mx-2">|</span>
                    <span>
                        {{ $tvshow['genres'] }}
                    </span>
                </div>

                <p class="text-gray-300 mt-8">
                    {{$tvshow['overview']}}
                </p>

                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Cast</h4>
                    <div class="flex mt-4">
                        @foreach ($tvshow['credits']['cast'] as $cast)
                            @if ($loop->index < 2)
                                <div class="mr-8">
                                    <div>{{$cast['name']}}</div>
                                    <div class="text-sm text-gray-400">{{$cast['known_for_department']}}</div>
                                </div>
                            @else
                                @break
                            @endif                        
                        @endforeach
                        @foreach ($tvshow['crew'] as $crew)
                            <div>
                                <div>{{$crew['name']}}</div>
                                <div class="text-sm text-gray-400">{{$crew['job']}}</div>
                            </div>                      
                        @endforeach
                    </div>

                    <div x-data="{ isOpen: false}">
                        @if (count($tvshow['videos']['results'])>0)
                            <div class="mt-12">
                                <button @click="isOpen = true" href="https://youtube.com/watch?v=" class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-3 hover:bg-orange-600 ease-in-out duration-150">
                                    <i class='bx bx-play-circle' style='font-size:22px' ></i>
                                    <div class="ml-2">Play Trailer</div>
                                </button>
                            </div>
                        @endif

                        <div
                            style="background-color: rgba(0, 0, 0, 0.5); "
                            class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                            x-show.transition.opacity="isOpen"
                            >
                            <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto" style=" width: 80%; ">
                                <div class="bg-gray-900 rounded">
                                    <div class="flex justify-end pr-4 pt-2">
                                        <button @click="isOpen=false" class="text-3xl leading-none hover:text-gray-300">&times;</button>
                                    </div>
                                    <div class="modal-body px-8 py-8">
                                        <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%;">
                                            <iframe width="560" height="315" class="responsive-iframe absolute top-0 
                                            left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $tvshow['videos']['results'][0]['key']}}"
                                            style="border:0;" allow="autoplay; encrypted-media" allowfullscreen>
                                            </iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>                  
            </div>
        </div>
    </div>


    <!-- Cast -->

    <div class="tvshow-cast border-b border-gray-800 pb-16" style="padding-left:97px; padding-right:97px">
        <div class="container mx-auto py-16" >
            <h2 class="text-4xl font-semibold" >
                Cast 
            </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
            @foreach ($tvshow['cast'] as $cast)
                <div class="mt-8">
                    <a href="{{ route('actors.detail',$cast['id']) }}">
                        <img src="{{ 'https://image.tmdb.org/t/p/w300/'.$cast['profile_path'] }}" alt="actor" class="hover:opacity-75" style="width:300px">
                    </a>
                    <div class="mt-2">
                        <a href="{{ route('actors.detail',$cast['id']) }}" class="text-lg mt-2 hover:text-gray-300">{{$cast['name']}}</a>
                    </div>
                    <div class="text-gray-400 text-sm">
                        {{$cast['character']}}
                    </div>
                </div>                                               
            @endforeach                  
        </div>
    </div>

    <!-- Images -->

    <div class="images border-b border-gray-800 pb-16" style="padding-left:97px; padding-right:97px" x-data="{isOpen: false, image: ''}">
        <div class="container mx-auto py-16">
            <h2 class="text-4xl font-semibold" >
                Images 
            </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-16">            
            @foreach ( $tvshow['images'] as $image )
               
                    <div class="mt-8">
                        <a 
                            href="#" 
                            @click.prevent="
                                isOpen = true 
                                image='{{ 'https://image.tmdb.org/t/p/original/'.$image['file_path'] }}' 
                        ">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$image['file_path'] }}" alt="actor" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                    </div>
                          
            @endforeach
        </div>

        <div
            style="background-color: rgba(0, 0, 0, 0.5); "
            class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
            x-show="isOpen "
            >
            <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto" style=" width: 80%; ">
                <div class="bg-gray-900 rounded">
                    <div class="flex justify-end pr-4 pt-2">
                        <button @click="isOpen=false" @keydown.escape.window="isOpen=false" class="text-3xl leading-none hover:text-gray-300">&times;</button>
                    </div>
                    <div class="modal-body px-8 py-8">
                        <img :src="image" alt="Poster">
                    </div>
                </div>
            </div>
        </div>

    </div> 

@endsection