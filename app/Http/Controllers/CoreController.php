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
use App\Models\Examiner;

class CoreController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function insertExaminerFromExcel(ExcelRequest $request)
    {
        Excel::import(new ExaminerImport, $request->excel_file);
        session()->flash("success", 'Exmainer inserted');
        return redirect()->route('index');
    }

    public function insertAnswersFromExcel(ExcelRequest $request)
    {
        ini_set('max_execution_time', 1200);
        //insert for this excel for who has the even barcode
        $examiners = Examiner::select('Ex_Barcode')->get();
        foreach ($examiners as $examiner) {
            //the ! is to add them for the odds
            if (is_int(intval($examiner->Ex_Barcode) / 2)) {
                Excel::import(new AnswersImport(intval($examiner->Ex_Barcode)), $request->excel_file);
            }
        }

        session()->flash("success", 'Answers inserted');
        return redirect()->route('index');
    }

    public function insertResultsFromExcel(ExcelRequest $request)
    {
        ini_set('max_execution_time', 1200);
        //insert for this excel for who has the even barcode
        $examiners = Examiner::select('Ex_Barcode')->get();
        foreach ($examiners as $examiner) {
            //the ! is to add them for the odds
            if (!is_int(intval($examiner->Ex_Barcode) / 2)) {
                Excel::import(new ResultsImport(intval($examiner->Ex_Barcode)), $request->excel_file);
            }
        }

        session()->flash("success", 'Results inserted');
        return redirect()->route('index');
    }

    public function getExaminerExcel(ExaminerRequest $request)
    {
        return Excel::download(new ExaminersExport($request->ex_name), 'examiner.xlsx');
    }

    public function getAnswersExcel(ExaminerRequest $request)
    {
        $examiner = Examiner::where('ex_name', $request->ex_name)->firstOrFail();
        $rs_barcode = $examiner->Ex_Barcode;
        return Excel::download(new AnswersExport($rs_barcode), 'answers.xlsx');
    }

    public function getResultsExcel(ExaminerRequest $request)
    {
        $examiner = Examiner::where('ex_name', $request->ex_name)->firstOrFail();
        $rs_barcode = $examiner->Ex_Barcode;
        return Excel::download(new ResultsExport($rs_barcode), 'results.xlsx');
    }
}
