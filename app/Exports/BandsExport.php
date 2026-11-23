<?php

namespace App\Exports;

use App\Models\Band;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BandsExport implements FromCollection, WithHeadings
{
    public function collection(): Collection
    {
        return Band::withCount('albums')
            ->get()
            ->map(function ($band) {
                return [
                    'name' => $band->name,
                    'albums_count' => $band->albums_count,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Nome da banda',
            'Número de álbuns',
        ];
    }
}
