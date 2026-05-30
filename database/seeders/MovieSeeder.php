<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        $movies = [
            [
                'title'       => 'Inception',
                'genre'       => 'Sci-Fi',
                'year'        => 2010,
                'rating'      => 8.8,
                'description' => 'A thief who steals corporate secrets through dreams.',
            ],
            [
                'title'       => 'The Dark Knight',
                'genre'       => 'Action',
                'year'        => 2008,
                'rating'      => 9.0,
                'description' => 'Batman faces the Joker, a criminal mastermind.',
            ],
            [
                'title'       => 'Interstellar',
                'genre'       => 'Sci-Fi',
                'year'        => 2014,
                'rating'      => 8.6,
                'description' => 'A team of explorers travel through a wormhole in space.',
            ],
            [
                'title'       => 'The Notebook',
                'genre'       => 'Romance',
                'year'        => 2004,
                'rating'      => 7.8,
                'description' => 'A poor young man falls in love with a rich young woman.',
            ],
            [
                'title'       => 'Get Out',
                'genre'       => 'Horror',
                'year'        => 2017,
                'rating'      => 7.7,
                'description' => 'A young Black man uncovers a disturbing secret.',
            ],
            [
                'title'       => 'Toy Story',
                'genre'       => 'Animation',
                'year'        => 1995,
                'rating'      => 8.3,
                'description' => 'A cowboy doll is threatened by a new spaceman figure.',
            ],
        ];

        foreach ($movies as $movie) {
            Movie::create($movie);
        }
    }
}