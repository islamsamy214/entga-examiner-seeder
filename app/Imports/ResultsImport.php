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
    private $rs_barcode;

    public function __construct(int $Rs_Barcode)
    {
        $this->rs_barcode = $Rs_Barcode;
    }

    public function model(array $row)
    {
        $dates = ['2022-02-08 14:05:00', '2022-02-09 12:05:00', '2022-02-06 11:05:00', '2022-02-07 14:20:00', '2022-02-05 14:05:00',
        '2022-01-31 16:05:00', '2022-02-01 08:05:00', '2022-02-02 17:05:00', '2022-02-03 09:20:00', '2022-02-04 11:05:00'
        ];
        DB::unprepared('SET IDENTITY_INSERT T_Examiners ON');
        $results = Results::create([
            "Rs_Barcode" => $this->rs_barcode,
            "Rs_Exam_ID" => $row[1],
            "Rs_Saving_Date" => $dates[array_rand($dates)],
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
