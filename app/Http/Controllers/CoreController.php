<?php

namespace App\Http\Controllers;

use App\Exports\AnswersExport;
use App\Exports\ResultsExport;
use App\Imports\ExaminerImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExaminersExport;
use App\Http\Requests\ExaminerRequest;
use App\Http\Requests\ExcelRequest;
use App\Imports\AnswersImport;
use App\Imports\ResultsImport;

class CoreController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function insertExaminerFromExcel(ExcelRequest $request)
    {
        Excel::import(new ExaminerImport, $request->excel_file);
        session()->flash("success",'Exmainer inserted');
        return redirect()->route('index');
    }

    public function insertAnswersFromExcel(ExcelRequest $request)
    {
        Excel::import(new AnswersImport, $request->excel_file);
        session()->flash("success",'Answers inserted');
        return redirect()->route('index');
    }

    public function insertResultsFromExcel(ExcelRequest $request)
    {
        Excel::import(new ResultsImport, $request->excel_file);
        session()->flash("success",'Results inserted');
        return redirect()->route('index');
    }

    public function getExaminerExcel(ExaminerRequest $request)
    {
        return Excel::download(new ExaminersExport($request->ex_name), 'examiner.xlsx');
    }

    public function getAnswersExcel(ExaminerRequest $request)
    {
        dd($request->ex_name);
        return Excel::download(new AnswersExport($rs_barcode), 'answers.xlsx');
    }

    public function getResultsExcel(ExaminerRequest $request)
    {
        dd($request->ex_name);
        return Excel::download(new ResultsExport($rs_barcode), 'results.xlsx');
    }
}
