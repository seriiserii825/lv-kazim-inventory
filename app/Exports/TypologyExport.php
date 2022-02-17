<?php

namespace App\Exports;

use App\Tipology;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TypologyExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'id',
            'nometipologia',
            'nometipologia1',
            'nometipologia2',
            'nometipologia3',
            'nometipologia5',
        ];
    }

    public function collection()
    {
        return collect(Tipology::all());
    }
}
