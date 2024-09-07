@extends('layouts.main')

@section('content')
    <div class="container mx-auto py-10" style="padding-left:97px; padding-right:97px">
        <div class="popular-actors">
            <h2 class="uppercase trackiing-wider text-orange-500 text-lg font-semibold">Popular Actors</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

        @foreach ($popularActors as $actor)
            <div class="actors mt-8">
                <a href="{{ route('actors.detail',$actor['id']) }}">
                    <img src="{{ $actor['profile_path'] }}" class="hover:opacity-75 transition ease-in-out duration-150" alt="Profile image">
                </a>
                <div class="mt-2">
                    <a href="{{ route('actors.detail',$actor['id']) }}">{{ $actor['name'] }}</a>
                    <div class="text-sm truncate text-gray-400">{{ $actor['known_for'] }}</div>
                </div>
           </div>
        @endforeach

        </div>
    </div>

    <div class="flex justify-between mb-16" style="padding-left:97px; padding-right:97px">
        @if ($previous)
            <a href="/actors/page/{{ $previous }}">Previous</a>
        @else
            <div></div>
        @endif

        @if ($next)
            <a href="/actors/page/{{ $next }}">Next</a>
        @else
            <div></div>
        @endif
    </div>
@endsection