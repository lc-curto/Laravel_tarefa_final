<?php

namespace Database\Seeders;

use App\Models\Band;
use Illuminate\Database\Seeder;

class BandSeeder extends Seeder
{
    public function run(): void
    {
        $bands = [
            'Queen',
            'Metallica',
            'Nirvana',
            'Coldplay',
            'Linkin Park',
        ];

        foreach ($bands as $name) {
            Band::updateOrCreate(
                ['name' => $name],
                ['image' => null]
            );
        }
    }
}
