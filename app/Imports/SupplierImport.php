<?php

namespace App\Imports;

use App\Models\Supplier;
use Maatwebsite\Excel\Concerns\ToModel;

class SupplierImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Supplier([
            'name'     => $row[1],
            'articul'    => $row[0], 
            'rrc'    => $row[5], 
            'opt'    => $row[4], 
            'kol'    => $row[9], 
         ]);
    }
}


