<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class TvShowViewModel extends ViewModel
{
    public $tvshow;
    public function __construct($tvshow)
    {
        $this->tvshow = $tvshow;
    }

    public function tvshow()
    {
        return collect($this->tvshow)->merge([
            'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$this->tvshow['poster_path'],
            'vote_average' => round($this->tvshow['vote_average'] * 10),
            'first_air_date' => \Carbon\carbon::parse($this->tvshow['first_air_date'])->format('M d, Y'),
            'genres' => collect($this->tvshow['genres'])->pluck('name')->flatten()->implode(', '),
            'cast' => collect($this->tvshow['credits']['cast'])->take(8),
            'crew' => collect($this->tvshow['credits']['crew'])->take(1),
            'images' => collect($this->tvshow['images']['backdrops'])->take(6),
        ]);
    }
}
