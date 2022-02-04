<?php

namespace App\Imports;

use App\Models\Results;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;

class ResultsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        DB::unprepared('SET IDENTITY_INSERT T_Examiners ON');
        $results = Results::create([
            "Rs_Barcode" => $row[0],
            "Rs_Exam_ID" => $row[1],
            "Rs_Saving_Date" => $row[2],
            "Rs_Exam_Name" => $row[3],
            "Rs_Exam_Full_Mark" => $row[4],
            "Rs_Value" => $row[5],
            "Rs_Exam_Duration_In_Minutes" => $row[6],
            "Rs_Note" => $row[7],
            "Rs_ClassNo" => $row[8],
            "Computer_Name" => $row[9],
            "duration" => $row[10]
        ]);
        DB::unprepared('SET IDENTITY_INSERT T_Examiners OFF');

        return $results;
    }
}
