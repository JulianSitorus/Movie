<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class MovieViewModel extends ViewModel
{
    public $movie;
    public function __construct($movie)
    {
        $this->movie = $movie;
    }

    public function movie()
    {
        return collect($this->movie)->merge([
            'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$this->movie['poster_path'],
            'vote_average' => round($this->movie['vote_average'] * 10),
            'release_date' => \Carbon\carbon::parse($this->movie['release_date'])->format('M d, Y'),
            'genres' => collect($this->movie['genres'])->pluck('name')->flatten()->implode(', '),
            'cast' => collect($this->movie['credits']['cast'])->take(8),
            'crew' => collect($this->movie['credits']['crew'])->take(1),
            'images' => collect($this->movie['images']['backdrops'])->take(6),
        ]);
    }
}
