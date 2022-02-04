<?php

namespace App\Exports;

use App\Models\Results;
use Maatwebsite\Excel\Concerns\FromCollection;

class ResultsExport implements FromCollection
{
    private $rs_barcode;

    public function __construct($rs_barcode)
    {
        $this->rs_barcode = $rs_barcode;
    }

    public function collection()
    {
        return Results::where('rs_barcode', $this->rs_barcode)->get();
    }
}
