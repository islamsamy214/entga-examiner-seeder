<?php

namespace App\Imports;

use App\Models\Examiner;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;

class ExaminerImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        DB::unprepared('SET IDENTITY_INSERT T_Examiners ON');
        $examiner = Examiner::create([
            "Ex_Barcode" => $row[0],
            "sold_id" => $row[1],
            "Ex_name" => $row[2],
            "Ex_year" => $row[3],
            "Ex_stage" => $row[4],
            "Ex_qualification_code" => $row[5],
            "Ex_Mohafza_code" => $row[6],
        ]);
        DB::unprepared('SET IDENTITY_INSERT T_Examiners OFF');

        return $examiner;
    }
}
