<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectedAnswers extends Model
{
    use HasFactory;

    protected $table = "T_Selected_Answers";

    protected $fillable = [
        "Rs_Barcode", "Rs_Exam_ID", "Rs_Exam_Name", "Rs_Ques_ID", "Rs_Ques_Text", "Rs_Ans_ID", "Rs_Ans_Text", "Ans_Value", "Ans_order", "Ans_Cat"
    ];
    
    public $timestamps = false;
}
