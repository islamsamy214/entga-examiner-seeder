<?php

namespace App\Imports;

use App\Models\SelectedAnswers;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;

class AnswersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        DB::unprepared('SET IDENTITY_INSERT T_Examiners ON');
        $selected_answers = SelectedAnswers::create([
            "Rs_Barcode" => $row[0],
            "Rs_Exam_ID" => $row[1],
            "Rs_Exam_Name" => $row[2],
            "Rs_Ques_ID" => $row[3],
            "Rs_Ques_Text" => $row[4],
            "Rs_Ans_ID" => $row[5],
            "Rs_Ans_Text" => $row[6],
            "Ans_Value" => $row[7],
            "Ans_order" => $row[8],
            "Ans_Cat" => ''
        ]);
        DB::unprepared('SET IDENTITY_INSERT T_Examiners OFF');

        return $selected_answers;
    }
}
