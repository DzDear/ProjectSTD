<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\studentdb;
use App\CheckDatastudent;
use DataTables;
use Helper;
use DB;

use Excel;
use Carbon\Carbon;
use Storage;
use PDF;

class DatastudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $student_type = '';
      // dd($request->type);
      if ($request->has('student_type')) {
        $student_type = $request->get('student_type');
        $request->type = $student_type;
      }

      $data = studentdb::where('type',$request->type)->get();

      // $data = DB::table('studentdbs')
      //               ->Leftjoin('check_datastudents','studentdbs.id','=','check_datastudents.student_id')
      //               ->where('studentdbs.Type','=',$request->type)->get();
      // dd($data);

      $title = Helper::Gettitle();

      $title = $title[$request->type -1];
      $type = $request->type;

      return view('teacher.view', compact('data','title','type','student_type'));

    }
    public function indexView()
    {
        // code...
        $data = studentdb::all();
        return view('student.dataview', compact('data'));

    }

    public function SaveDatastudent(Request $request)
    {
        // code...
        foreach ($request->checkStudent as $Number => $status) {
          dd($request->Classtype); 
          $CheckData = new CheckDatastudent([
            'Card_student' => $Number,
            'type_check' => $status,
          ]);
          $CheckData->save();
        }

        dd('บันทึกข้อมูลเรียบร้อย');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
