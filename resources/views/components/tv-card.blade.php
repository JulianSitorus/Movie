<div>
    <div class="mt-8">
        <a href="{{ route('tv.detail',$tvshow['id']) }}">
            <img src="{{$tvshow['poster_path']}}" alt="" class="hover:opacity-75">
        </a>
        <div class="mt-2">
            <a href="{{ route('tv.detail',$tvshow['id']) }}" class="text-lg mt-2 hover:text-gray-300">
                {{$tvshow['name']}}
            </a>
        </div>
        <div class="flex item-center text-gray-400 text-sm mt-1">
            <i class='bx bxs-star' style='color:orange; margin-top:3px'></i>
            <span class="ml-1">{{ $tvshow['vote_average'] }}%</span>
            <span class="mx-2">|</span>
            <span>{{ $tvshow['first_air_date'] }}</span>
        </div>
        <div class="text-gray-400 text-sm">
            {{ $tvshow['genres'] }}
        </div>
    </div>
</div>