<?php

namespace App\Exports;

use App\Models\Album;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AlbumsExport implements FromCollection, WithHeadings
{
    public function collection(): Collection
    {
        return Album::with('band')
            ->get()
            ->map(function ($album) {
                return [
                    'name' => $album->name,
                    'release_date' => $album->release_date,
                    'band' => $album->band?->name,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Nome do álbum',
            'Ano de lançamento',
            'Banda',
        ];
    }
}
