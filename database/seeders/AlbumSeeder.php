<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Band;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    public function run(): void
    {
        $albums = [
            'Queen' => [
                ['name' => 'A Night at the Opera', 'year' => 1975],
                ['name' => 'News of the World', 'year' => 1977],
                ['name' => 'The Game', 'year' => 1980],
            ],

            'Metallica' => [
                ['name' => 'Master of Puppets', 'year' => 1986],
                ['name' => '...And Justice for All', 'year' => 1988],
                ['name' => 'Metallica', 'year' => 1991],
            ],

            'Nirvana' => [
                ['name' => 'Bleach', 'year' => 1989],
                ['name' => 'Nevermind', 'year' => 1991],
                ['name' => 'In Utero', 'year' => 1993],
            ],

            'Coldplay' => [
                ['name' => 'Parachutes', 'year' => 2000],
                ['name' => 'A Rush of Blood to the Head', 'year' => 2002],
                ['name' => 'X&Y', 'year' => 2005],
            ],

            'Linkin Park' => [
                ['name' => 'Hybrid Theory', 'year' => 2000],
                ['name' => 'Meteora', 'year' => 2003],
                ['name' => 'Minutes to Midnight', 'year' => 2007],
            ],
        ];

        foreach ($albums as $bandName => $bandAlbums) {
            $band = Band::where('name', $bandName)->firstOrFail();

            foreach ($bandAlbums as $album) {
                Album::updateOrCreate(
                    [
                        'name' => $album['name'],
                        'band_id' => $band->id,
                    ],
                    [
                        'release_date' => $album['year'],
                        'image' => null,
                    ]
                );
            }
        }
    }
}
