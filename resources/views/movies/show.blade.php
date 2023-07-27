@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{$movie['poster_path']}}" alt="" class="w-64 md:w-96" style="width: 24rem">
            <div class="md:ml-24">
                <div class="text-4xl font-semibold">
                    {{$movie['title']}}
                </div>
                <div class="flex flex-wrap items-center text-gray-400 text-sm mt-1">
                    <span class="current-fill text-orange-500 w-4"><i class="ti-star"></i></span>
                    <span class="ml-1">{{$movie['vote_average']}}</span>
                    <span class="mx-2">|</span>
                    <span>{{$movie['release_date']}}</span>
                    <span class="mx-2">|</span>
                    <span>
                       {{$movie['genres']}}
                    </span>
                </div>
                <p class="text-gray-300 mt-8">
                    {{$movie['overview']}}
                </p>
                <div class="mt-12">
                    <h4 class="text-white semibold">
                        Feature Crew
                    </h4>
                    <div class="flex mt-4">
                        @foreach ($movie['crew'] as $crew)
                        <div>
                            <div>{{$crew['name']}}</div>
                            <div class="text-sm text-gray-400">{{$crew['job']}}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div x-data="{isOpen:false}">
                    @if (count($movie['videos']['results'])>0)
                        <div class="mt-12">
                            <button @click="isOpen=true" href="https://youtube.com/watch?v={{$movie['videos']['results'][0]['key']}}" class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                                <i class="ti-control-play"></i>
                                <span class="ml-2">Play Trailer</span>
                            </button >
                        </div>
                    @endif

                    <div x-show.transition.opacity="isOpen" style="background-color: rgba(0,0,0,.5)" class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
                        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                            <div class="bg-gray-900 rounded">
                                <div class="flex justify-end pr-4 pt-2">
                                    <button @click="isOpen=false" class="text-3xl leading-none hover:text-gray-300">
                                        <i class="ti-close text-sm"></i>
                                    </button>
                                </div>
                                <div class="modal-body py-8 px-8">
                                    <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                        <iframe width="560" height="315" class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://youtube.com/embed/{{$movie['videos']['results'][0]['key']}}" style="border: 0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- end movie info --}}

    <div class="movies-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($movie['cast'] as $cast)
                <div class="mt-8">
                    <a href="{{route('actors.show',$cast['id'])}}">
                        <img src="{{'https://image.tmdb.org/t/p/w500/'.$cast['profile_path']}}" alt="daupha" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="{{route('actors.show',$cast['id'])}}" class="text-lg mt-2 hover:text-gray:300">{{$cast['name']}}</a>
                        <div class="text-sm text-gray-400">
                            {{$cast['character']}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- end movie cast --}}
    <div class="movies-image border-b border-gray-800" x-data="{ isOpen:false, image:'' }">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach ($movie['images'] as $image)
                <div class="mt-8">
                    <a @click.prevent="
                        isOpen=true
                        image='{{'https://image.tmdb.org/t/p/original/'.$image['file_path']}}'
                     ">
                        <img src="{{'https://image.tmdb.org/t/p/w500/'.$image['file_path']}}" alt="daupha" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
                @endforeach
                <div x-show.transition.opacity="isOpen" style="background-color: rgba(0,0,0,.5)" class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
                    <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                        <div class="bg-gray-900 rounded">
                            <div class="flex justify-end pr-4 pt-2">
                                <button @click="isOpen=false" @keydown.escape.window="isOpen=false" class="text-3xl leading-none hover:text-gray-300">
                                    <i class="ti-close text-sm"></i>
                                </button>
                            </div>
                            <div class="modal-body py-8 px-8">
                                <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                    <img  width="560" height="315" class="responsive-iframe absolute top-0 left-0 w-full h-full" :src="image" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
