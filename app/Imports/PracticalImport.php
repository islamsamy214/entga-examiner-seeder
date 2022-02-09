<?php

namespace App\Imports;

use App\Models\Practical;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;


class PracticalImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */


    public function model(array $row)
    {
        $exam_ids = [35, 37, 39,  40, 46];
        $exam_names = ['شدة السمع', 'قبضة يمين', 'الظهر و الرجلين', 'بذل الجهد', 'قبضة شمال'];
        $dates = ['2022-02-06 14:05:00', '2022-02-09 12:05:00', '2022-02-12 11:05:00', '2022-02-07 14:20:00', '2022-02-14 14:05:00'];

        foreach($exam_ids as $index=>$exam_id){
            $results = Practical::create([
                "Rs_Barcode" => $row[0],
                "Rs_Exam_ID" => $exam_id,
                "Rs_Saving_Date" => $dates[array_rand($dates)],
                "Rs_Exam_Name" => $exam_names[$index],
                "Computer_Name" => 'Core',
                "Rs_Value" => $row[$index+1],
            ]);
        }

        return $results;
    }
}
