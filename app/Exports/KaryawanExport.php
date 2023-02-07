<?php

namespace App\Exports;

use App\Models\karyawan;
use Maatwebsite\Excel\Concerns\FromCollection;

class KaryawanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return karyawan::all();
    }
}
