<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\studentdb;
use App\Imports\UsersImport;
use Helper;

use Excel;
use Carbon\Carbon;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->type);
        $type = $request->type;
        return view('import.import',compact('type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('asdsad');
        return view('import.import');
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

    public function importDataStudent(Request $request)
    {
        $this->validate($request,['file' => 'required']);

        $usersCollection = Excel::toCollection(new UsersImport(), $request->file('file'));

        foreach ($usersCollection[0] as $user) {
          $studentFromDB = studentdb::where('Number', '=', $user[0])->first();

          if ($user[0] != 'Number') {
            if($studentFromDB != null && $studentFromDB->exists()) {
              //Update here..
              $studentFromDB->Number = $user[0];
              $studentFromDB->Id_Card = $user[1];
              $studentFromDB->Pname = $user[2];
              $studentFromDB->Fname = $user[3];
              $studentFromDB->Lname = $user[4];
              $studentFromDB->Class_Room = $user[5];
              $studentFromDB->Type = $user[6];
              $studentFromDB->Room = $user[7];

              $studentFromDB->save();

            } else {
              //Create here
              $student = new studentdb();

              $student->Number = $user[0];
              $student->Id_Card = $user[1];
              $student->Pname = $user[2];
              $student->Fname = $user[3];
              $student->Lname = $user[4];
              $student->Class_Room = $user[5];
              $student->Type = $user[6];
              $student->Room = $user[7];

              $student->save();
            }
          }
        }
        return redirect()->Route('import.create')->with('success','อัพเดตข้อมูลเรียบร้อย');
    }

    public function importCheckStudent(Request $request)
    {
      dd('dfghjkl');
      
        $this->validate($request,['file' => 'required']);

        $usersCollection = Excel::toCollection(new UsersImport(), $request->file('file'));

        foreach ($usersCollection[0] as $user) {
          $studentFromDB = studentdb::where('Number', '=', $user[0])->first();

          if ($user[0] != 'Number') {
            if($studentFromDB != null && $studentFromDB->exists()) {
              //Update here..
              $studentFromDB->Number = $user[0];
              $studentFromDB->Id_Card = $user[1];
              $studentFromDB->Pname = $user[2];
              $studentFromDB->Fname = $user[3];
              $studentFromDB->Lname = $user[4];
              $studentFromDB->Class_Room = $user[5];
              $studentFromDB->Type = $user[6];
              $studentFromDB->Room = $user[7];

              $studentFromDB->save();

            } else {
              //Create here
              $student = new studentdb();

              $student->Number = $user[0];
              $student->Id_Card = $user[1];
              $student->Pname = $user[2];
              $student->Fname = $user[3];
              $student->Lname = $user[4];
              $student->Class_Room = $user[5];
              $student->Type = $user[6];
              $student->Room = $user[7];

              $student->save();
            }
          }
        }
        return redirect()->Route('import.create')->with('success','อัพเดตข้อมูลเรียบร้อย');
    }
}
