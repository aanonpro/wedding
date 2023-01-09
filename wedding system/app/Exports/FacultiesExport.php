<?php

namespace App\Exports;

use App\Models\Faculty;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class FacultiesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Faculty::all();
        return Faculty::select("id", "name", "khmer","status","trash","created_by","updated_by")->get();

    }
    public function headings(): array
    {
        return ["ID", "Name", "Khmer","Status","Trash","Created_by","updated_by"];
    }
}
