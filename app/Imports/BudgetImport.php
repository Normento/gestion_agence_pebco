<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class BudgetImport implements WithMultipleSheets
{


    public function sheets(): array
    {

        return [
            0 => new InteretImport(),
            1 => new DepenseImport(),
            2 => new FraisClientImport(),

        ];
    }
}
