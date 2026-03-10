<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class RiwayatExport implements FromCollection
{
    public function collection()
    {
        // Dummy implementation
        return collect([]);
    }
}