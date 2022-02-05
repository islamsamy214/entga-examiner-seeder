<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    use HasFactory;

    protected $table = "T_Results";

    protected $fillable = [
        "Rs_Barcode", "Rs_Exam_ID", "Rs_Saving_Date", "Rs_Exam_Name", "Rs_Exam_Full_Mark", "Rs_Value", "Rs_Exam_Duration_In_Minutes", "Rs_Note", "Rs_ClassNo", "Computer_Name", "duration"
    ];

    public $timestamps = false;
}
