<?php

namespace App\Imports;

use App\Models\Faculty;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FacultiesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Faculty([
            'name'     => $row['name'],
            'khmer'    => $row['khmer'],
            'status'   => $row['status'],
            'trash'    => $row['trash'],
            'created_by' => $row['created_by'],
            'updated_by' => $row['updated_by'],
            // 'password' => Hash::make($row['password']),
        ]);
    }
    
}
