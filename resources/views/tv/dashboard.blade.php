@extends('layouts.main')

@section('content')
    <div class="container mx-auto pt-10" style="padding-left:97px; padding-right:97px">
        <div class="popular-movies">
            <h2 class="uppercase trackiing-wider text-orange-500 text-lg font-semibold">Popular Shows</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

            @foreach ($popularTv as $tvshow )
                <x-tv-card :tvshow="$tvshow" />
            @endforeach

        </div>
    </div>

    <div class="container mx-auto py-10" style="padding-left:97px; padding-right:97px">
        <div class="now-playing">
            <h2 class="uppercase trackiing-wider text-orange-500 text-lg font-semibold">Top Rated Shows</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

            @foreach ($topRatedTv as $tvshow )
                <x-tv-card :tvshow="$tvshow" />
            @endforeach

        </div>
    </div>
@endsection