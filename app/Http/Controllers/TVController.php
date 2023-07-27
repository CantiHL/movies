<?php

namespace App\Http\Controllers;

use App\ViewModels\MovieViewModel;
use App\ViewModels\TVShowViewModel;
use App\ViewModels\TVViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TVController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $popularTV=Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/tv/popular')->json()['results'];
        $nowPlayingTV=Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/tv/top_rated')->json()['results'];
        $genres=Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/genre/tv/list')->json()['genres'];
        $viewModal=new TVViewModel($popularTV,$nowPlayingTV,$genres);
        return view('tv.index',$viewModal);
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
    public function show(string $id)
    {
        $tvshow=Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/tv/'.$id.'?append_to_response=credits,videos,images')->json();
        $viewModal=new TVShowViewModel($tvshow);
        return view('tv.show',$viewModal);
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
