@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 flex items-center justify-between py-6">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular movies</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularMovies as $popularMovie)
               <x-movie-card :movie="$popularMovie" />
                @endforeach
            </div>
        </div>
    </div>
    <div class="container mx-auto px-4 flex items-center justify-between py-6">
        <div class="now-playing-movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">now playing</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($nowPlayingMovies as $nowPlayingMovie)
                    <x-movie-card :movie="$nowPlayingMovie" />
                @endforeach
            </div>
        </div>
    </div>
@endsection
