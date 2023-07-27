<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TVShowViewModel extends ViewModel
{
    public $tvshow;
    public function __construct($tvshow)
    {
        $this->tvshow=$tvshow;
    }

    public function tvshow(){
        $tvshow=$this->tvshow;
        return collect($tvshow)->merge([
            'poster_path'=>'https://image.tmdb.org/t/p/w500/'.$tvshow['poster_path'],
            'vote_average'=>$tvshow['vote_average']*10 .'%',
            'first_air_date'=> Carbon::parse($tvshow['first_air_date'])->format('M d, Y'),
            'genres'=>collect($tvshow['genres'])->pluck('name')->flatten()->implode(', '),
            'crew'=>collect($tvshow['credits']['crew'])->take(2),
            'cast'=>collect($tvshow['credits']['cast'])->take(5),
            'images'=>collect($tvshow['images']['backdrops'])->take(9),
            'videos'=>$tvshow['videos']['results']?:[],
        ]);
    }
}
