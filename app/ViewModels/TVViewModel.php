<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TVViewModel extends ViewModel
{
    public $popularTV,$nowPlayingTV, $genres;
    public function __construct($popularTV,$nowPlayingTV, $genres)
    {
        $this->popularTV=$popularTV;
        $this->nowPlayingTV=$nowPlayingTV;
        $this->genres=$genres;
    }
    public function popularTV(){
        return $this->formatTV($this->popularTV);
    }
    public function nowPlayingTV(){
        return $this->formatTV($this->nowPlayingTV);
    }
    public function genres(){
        return collect($this->genres)->mapWithKeys(function($genre){
            return [$genre['id']=>$genre['name']];
        });
    }

    private function formatTV($tv){
        return collect($tv)->map(function ($tvshow){
            $genresFormated=collect($tvshow['genre_ids'])->mapWithKeys(function ($value){
                return [$value=>$this->genres()->get($value)];
            })->implode(', ');
            return collect($tvshow)->merge([
                'poster_path'=>'https://image.tmdb.org/t/p/w500/'.$tvshow['poster_path'],
                'vote_average'=>$tvshow['vote_average']*10 .'%',
                'first_air_date'=> Carbon::parse($tvshow['first_air_date'])->format('M d, Y'),
                'genres'=>$genresFormated
            ])->only([
                'poster_path','id','name','overview','vote_average','first_air_date','genres'
            ]);
        });
    }
}
