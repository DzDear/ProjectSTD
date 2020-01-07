<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\studentdb;
use App\Imports\UsersImport;
use Helper;
use DB;

use Excel;
use Carbon\Carbon;
use Storage;
use DataTables;
use PDF;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $studentType = '';
      $studentRoom = '';

      if ($request->has('student_type')) {
        $studentType = $request->get('student_type');
      }
      if ($request->has('student_room')) {
        $studentRoom = $request->get('student_room');
      }

      if ($request->type == 1 and $studentRoom == Null) {
        $data = DB::table('studentdbs')
        ->where('Room','=',1)
        ->get();
      }else {
        $data = DB::table('studentdbs')
        // ->where('Type','=',$studentType)
        ->when(!empty($studentType), function($q) use($studentType){
          return $q->where('Type','=',$studentType);
        })
        ->when(!empty($studentRoom), function($q) use($studentRoom){
          return $q->where('Room','=',$studentRoom);
        })
        ->get();
      }
      // dd($data);

      // $data = studentdb::where('type',$request->type)->get();
      // $title = Helper::Gettitle();
      // $title = $title[$request->type -1];

      $type = $request->type;
      return view('student.view', compact('data','title','type','studentType','studentRoom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd('asdasd');
        $title = Helper::Gettitle();
        $title = $title[$request->type -1];
        $type = $request->type;
        return view('student.create', compact('title','type'));
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
        $this->validate($request,['student_Number' => 'required','student_Pname' => 'required','student_Fname' => 'required','student_Lname' => 'required']);

        $studendb = new studentdb([
          'Number' => $request->get('student_Number'),
          'Id_card' => $request->get('student_Id_card'),
          'Pname' => $request->get('student_Pname'),
          'Fname' => $request->get('student_Fname'),
          'Lname' => $request->get('student_Lname'),
          'Class_Room' => $request->get('student_Class_Room'),
          'Type' => $request->get('student_type')
        ]);
        $studendb->save();

        $Type = $request->student_type;
        return redirect()->Route('ViewStudent',$Type)->with('success','บันทึกข้อมูลเรียบร้อย');
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
    public function edit($id,Request $request)
    {
        // dd($request);
        $user = studentdb::find($id);
        // dd($user);
        // $title = Helper::Gettitle();
        // $title = $title[$request->type -1];
        // $type = $request->Type;

        return view('student.edit',compact('user','id'));
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
        $this->validate($request,['student_Number' => 'required']);  /**required =ตรวจสอบ,จำเป็นต้องป้อนข้อมูล */

        $user = studentdb::find($id);

        $user->Number = $request->get('student_Number');
        $user->Id_Card = $request->get('student_Id_Card');
        $user->Pname = $request->get('student_Pname');
        $user->Fname = $request->get('student_Fname');
        $user->Lname = $request->get('student_Lname');
        $user->Class_Room = $request->get('student_Class_Room');

        $user->update();

        // dd('asdasds');
        $type = $user->Type;
        return redirect()->Route('ViewStudent',$type)->with('success','อัพเดตข้อมูลเรียบร้อย');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = studentdb::find($id);

        // Storage::delete($item->file_name);

        $item->Delete();
        return redirect()->back()->with('success','ลบข้อมูลเรียบร้อย');
    }
}
