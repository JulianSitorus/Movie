<div>
    <div class="mt-8">
        <a href="{{ route('movies.detail',$movie['id']) }}">
            <img src="{{$movie['poster_path']}}" alt="" class="hover:opacity-75">
        </a>
        <div class="mt-2">
            <a href="{{ route('movies.detail',$movie['id']) }}" class="text-lg mt-2 hover:text-gray-300">
                {{$movie['title']}}
            </a>
        </div>
        <div class="flex item-center text-gray-400 text-sm mt-1">
            <i class='bx bxs-star' style='color:orange; margin-top:3px'></i>
            <span class="ml-1">{{ $movie['vote_average'] }}%</span>
            <span class="mx-2">|</span>
            <span>{{ $movie['release_date'] }}</span>
        </div>
        <div class="text-gray-400 text-sm">
            <!-- @foreach ($movie['genre_ids'] as $genre )
                {{$genres->get($genre)}} @if (!$loop->last), @endif
            @endforeach -->
            {{ $movie['genres'] }}
        </div>
    </div>
</div>