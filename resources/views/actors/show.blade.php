@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src="{{$actor['profile_path']}}" alt="" class="w-64 md:w-96" style="width: 24rem">
                <ul class="flex items-center mt-4">
                    @if($social['facebook'])
                        <li class="ml-6"><a href="{{$social['facebook']}}"  title="Facebook"><i class="ti-facebook"></i></a></li>
                    @endif
                    @if($social['instagram'])
                        <li class="ml-6"><a href="{{$social['instagram']}}"  title="Instagram"><i class="ti-instagram"></i></a></li>
                    @endif
                    @if($social['twitter'])
                        <li class="ml-6"><a href="{{$social['twitter']}}"  title="Twitter"><i class="ti-twitter"></i></a></li>
                    @endif
                    @if($actor['homepage'])
                       <li class="ml-6"><a href="{{$actor['homepage']}}"  title="Website"><i class="ti-dribbble"></i></a></li>
                    @endif




                </ul>
            </div>
            <div class="md:ml-24">
                <h2 class="text-4xl mt-4 md:mt-0 font-semibold">
                    {{$actor['name']}}
                </h2>
                <div class="text-4xl font-semibold">

                </div>
                <div class="flex flex-wrap items-center text-gray-400 text-sm mt-1">
                    <span class="current-fill text-orange-500 w-4"><i class="ti-calendar"></i></span>
                    <span class="ml-1">{{$actor['birthday']}}</span>
                    <span class="mx-2">{{$actor['age']}}</span>
                    <span>{{$actor['place_of_birth']}}</span>
                    <span class="mx-2">|</span>
                </div>
                <p class="text-gray-300 mt-8">
                   {{$actor['biography']}}
                </p>
                <h4 class="font-semibold mt-12">Know For</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
                    @foreach($knownForMovies as $movie)
                        <div class="mt-4">
                            <a href="{{$movie['linkToPage']}}">
                                <img src="{{$movie['poster_path']}}" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <div class="mt-2">
                                <a href="{{$movie['linkToPage']}}" class="text-sm leading-mormal block hover:text-white-400 mt-1">{{$movie['title']}}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>



    {{-- end movie info --}}

    <div class="movies-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Credits</h2>
            <ul class="list-disc leading-loose pl-5 mt-8">
                @foreach($credits as $credit)
                    <li>{{$credit['release_year']}} - <strong>{{$credit['title']}}</strong> as {{$credit['character']}}</li>
                @endforeach
            </ul>

        </div>
    </div>
    {{-- end  credits --}}
@endsection
