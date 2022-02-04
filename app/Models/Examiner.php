<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examiner extends Model
{
    use HasFactory;

    protected $table = "T_Examiners";

    protected $fillable = [
        "Ex_Barcode", "sold_id", "Ex_name", "Ex_year", "Ex_stage", "Ex_qualification_code", "Ex_Mohafza_code"
    ];

    public $timestamps = false;
}
