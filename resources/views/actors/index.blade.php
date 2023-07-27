@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 flex items-center justify-between py-6">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Actors</h2>
            <div id="grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach($popularActors as $actor)
                    <div class="actor mt-8">
                        <a href="{{route('actors.show',$actor['id'])}}">
                            <img src="{{$actor['profile_path']}}" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="{{route('actors.show',$actor['id'])}}" class="text-lg hover:text-gray-300">{{$actor['name']}}</a>
                            <div class="text sm truncate text-gray-400">
                                {{$actor['known_for']}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="page-load-status py-8">
                <p class="infinite-scroll-request">Loading...</p>
                <p class="infinite-scroll-last">End of content</p>
                <p class="infinite-scroll-error">No more pages to load</p>
            </div>
            <div class="flex justify-between">
                @if($previous)
                    <a hidden="" class="hover:opacity-50" href="{{route('actors.index')}}/page/{{$previous}}" >Previous</a>
                @else
                    <div></div>
                @endif
                @if($next)
                    <a id="nxt" hidden="" class="url-next-actors-page hover:opacity-50" href="{{route('actors.index')}}/page/{{$next}}" >Next</a>
                    @else
                    <div></div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>
    <script>
        function getPath() {
            var more = document.getElementById('nxt').href;
            return more;
        }
        var grid=document.querySelector('.grid')
        var infScroll = new InfiniteScroll( grid, {
            path: '.url-next-actors-page',
            append: '.actor',
            status: '.page-load-status'
        });

    </script>
@endsection
