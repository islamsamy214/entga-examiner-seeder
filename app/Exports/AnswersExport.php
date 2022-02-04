<?php

namespace App\Exports;

use App\Models\SelectedAnswers;
use Maatwebsite\Excel\Concerns\FromCollection;

class AnswersExport implements FromCollection
{
    private $rs_barcode;

    public function __construct($rs_barcode)
    {
        $this->rs_barcode = $rs_barcode;
    }

    public function collection()
    {
        return SelectedAnswers::where('rs_barcode', $this->rs_barcode)->get();
    }
}
