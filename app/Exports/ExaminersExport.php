<?php

namespace App\Exports;

use App\Models\Examiner;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExaminersExport implements FromCollection
{
    private $ex_name;

    public function __construct($ex_name)
    {
        $this->ex_name = $ex_name;
    }

    public function collection()
    {
        Examiner::where('Ex_name', $this->ex_name)->firstOrFail();
        return Examiner::where('Ex_name', $this->ex_name)->get();
    }
}
