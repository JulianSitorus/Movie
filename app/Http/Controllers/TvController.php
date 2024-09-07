<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\ViewModels\TvShowViewModel;
use App\ViewModels\TvViewModel;
use Http;
use Illuminate\Http\Request;

class TvController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function tv_dashboard()
    {
        $popularTv = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/popular')
            ->json()['results'];

        $genres = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/tv/list')
            ->json()['genres'];

        $topRatedTv = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/top_rated')
            ->json()['results'];

       
        // return view('dashboard',[
        //     'popularMovies' => $popularMovies,
        //     'genres' => $genres,
        //     'nowPlayingMovies' => $nowPlayingMovies,
        // ]);

        $viewModel = new TvViewModel(
            $popularTv,
            $topRatedTv,
            $genres,
        );

        return view('tv.dashboard', $viewModel);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function tv_detail(string $id)
    {
        $tvshow = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/'.$id.'?append_to_response=credits,videos,images')
            ->json();

        $viewModel = new TvShowViewModel($tvshow);
        
        return view('tv.detail', $viewModel);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
