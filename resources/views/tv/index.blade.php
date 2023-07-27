@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 flex items-center justify-between py-6">
        <div class="popular-tv">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular TV</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularTV as $tvshow)
                    <x-tv-card :tvshow="$tvshow"/>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container mx-auto px-4 flex items-center justify-between py-6">
        <div class="now-playing-tv">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">top rate shows</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($nowPlayingTV as $nowPlayingTV)
                    <x-tv-card :tvshow="$nowPlayingTV" />
                @endforeach
            </div>
        </div>
    </div>
@endsection
