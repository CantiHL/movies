<?php

namespace Tests\Feature;

use Livewire\Livewire;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;


class ViewMoviesTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_main_show_correct_info(): void
    {
        Http::fake([
            'https://api.themoviedb.org/3/movie/popular'=>$this->fakePopularMovies(),
            'https://api.themoviedb.org/3/movie/now_playing'=>$this->fakeNowPlayingMovies(),
            'https://api.themoviedb.org/3/genre/movie/list'=>$this->fakeGenres(),
        ]);
        $response = $this->get(route('movies.index'));
        $response->assertSuccessful();
        $response->assertSee('Popular movies');
        $response->assertSee('Fast X');
        $response->assertSee('Action, Adventure, Science Fiction');
        $response->assertSee('now playing');
        $response->assertSee('Transformers: Rise of the Beasts');
    }

    public function test_page_show_correct_info(){
        Http::fake([
            'https://api.themoviedb.org/3/movie/*'=>$this->fakeShowMovies(),
        ]);
        $response = $this->get(route('movies.show',667538));
        $response->assertSuccessful();
    }

    public function test_search_dropdown_correct(){
        Http::fake([
            'https://api.themoviedb.org/3/search/movies?query=fast'=>$this->fakeSearchMovies(),
        ]);
        Livewire::test('search-dropdown');
        $response = $this->get(route('movies.show',667538));
        $response->assertSuccessful();
    }
    public function fakePopularMovies(): void
    {
         Http::response([
            'results'=> [
                'adult' => false,
                'backdrop_path' => '/qWQSnedj0LCUjWNp9fLcMtfgadp.jpg',
                'genre_ids' => [
                  0 => 28,
                  1 => 12,
                  2 => 878
                ],
                'id' => 667538,
                'original_language' => 'en',
                'original_title' => 'Fake Movie',
                'overview' => 'When a new threat capable of destroying the entire planet eme
            rges, Optimus Prime and the Autobots must team up with a powerful faction known
            as the Maximals. With the fate of humanity hanging in the balance, humans Noah a
            nd Elena will do whatever it takes to help the Transformers as they engage in th
            e ultimate battle to save Earth.',
                'popularity' => 10053.202,
                'poster_path' => '/gPbM0MK8CP8A174rmUwGsADNYKD.jpg',
                'release_date' => '2023-06-06',
                'title' => 'Fake Movie',
                'video' => false,
                'vote_average' => 7.3,
                'vote_count' => 1383
              ]

        ], 200);
    }
    public function fakeNowPlayingMovies(): void
    {
         Http::response([
            'results'=> [
                'adult' => false,
                'backdrop_path' => '/lQzSMhkAl90iXPirjnLbRHkxApC.jpg',
                'genre_ids' => [
                  0 => 27
                ],
                'id' => 917007,
                'original_language' => 'en',
                'original_title' => 'Now playing fake movie',
                'overview' => 'A pregnant woman on Now playing fake movie begins to wonder if her house is
             haunted or if its all in her head.',
                'popularity' => 363.471,
                'poster_path' => '/tiZF8b9T9fMcwvsEEkJ5ik1wCnV.jpg',
                'release_date' => '2022-12-08',
                'title' => 'Now playing fake movie',
                'video' => false,
                'vote_average' => 6.7,
                'vote_count' => 107
              ]


        ], 200);
    }
    public function fakeGenres(): void
    {
         Http::response([
            'results'=>  [
                28 => 'Action',
                12 => 'Adventure',
                16 => 'Animation',
                35 => 'Comedy',
                80 => 'Crime',
                99 => 'Documentary',
                18 => 'Drama',
                10751 => 'Family',
                14 => 'Fantasy',
                36 => 'History',
                27 => 'Horror',
                10402 => 'Music',
                9648 => 'Mystery',
                10749 => 'Romance',
                878 => 'Science Fiction',
                10770 => 'TV Movie',
                53 => 'Thriller',
                10752 => 'War',
                37 => 'Western'
              ]


        ], 200);
    }
    public function fakeShowMovies(): void
    {
         Http::response([
            'adult' => false,
            'backdrop_path' => '/qWQSnedj0LCUjWNp9fLcMtfgadp.jpg',
            'belongs_to_collection' => [
              'id' => 939352,
              'name' => 'Transformers: Rise of the Beasts Collection',
              'poster_path' => '/6sAdtwp5LV0jlNVhefTMEsjP7py.jpg',
              'backdrop_path' => null
            ],
            'budget' => 195000000,
            'genres' => [
              0 => [
                'id' => 28,
                'name' => 'Action'
              ],
              1 => [
                'id' => 12,
                'name' => 'Adventure'
              ],
              2 => [
                'id' => 878,
                'name' => 'Science Fiction'
              ]
            ]
        ],200);
    }
    public function fakeSearchMovies()
    {
         return Http::response([
            'results'=> [
            0 => [
              'adult' => false,
              'backdrop_path' => '/4XM8DUTQb3lhLemJC51Jx4a2EuA.jpg',
              'genre_ids' => [],
              'id' => 385687,
              'original_language' => 'en',
              'original_title' => 'Fast X',
              'overview' => 'Over many missions and against impossible odds, Dom Toretto and his family have outsmarted, out-nerved and outdriven every foe in their path. Now, they confront[',
              'popularity' => 2053.681,
              'poster_path' => '/fiVW06jE7z9YnO4trhaMEdclSiC.jpg',
              'release_date' => '2023-05-17',
              'title' => 'Fast X',
              'video' => false,
              'vote_average' => 7.3,
              'vote_count' => 2773
            ],
            1 => [
              'adult' => false,
              'backdrop_path' => null,
              'genre_ids' => [],
              'id' => 391559,
              'original_language' => 'en',
              'original_title' => 'Fast',
              'overview' => 'A balls to the wall action film about Fast, the fastest person alive, who is also named Fast.',
              'popularity' => 1.045,
              'poster_path' => '/p8c0a159yKnpciQCFsR8BaC23po.jpg',
              'release_date' => '2010-06-24',
              'title' => 'Fast',
              'video' => false,
              'vote_average' => 3.25,
              'vote_count' => 2
            ]
          ]
        ]);
    }
}
