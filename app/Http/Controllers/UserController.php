<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(auth()->user()->type == 1){
        $users = User::all();
        return view('maindata.view', compact('users'));
      }else {
        dd('You not admin');
        return view('home');
      }
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
      $user = User::find($id);
      // dd($user);
      $arrayType = [
        1 => 'Admin',
        2 => 'Writer',
        3 => 'Reader',
      ];

      // dd($arrayType);

      return view('maindata.edit',compact('user','id','arrayType'));
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
      $this->validate($request,['main_username' => 'required','main_name' => 'required','main_email' => 'required','section_type' => 'required']);  /**required =ตรวจสอบ,จำเป็นต้องป้อนข้อมูล */

      $user = User::find($id);

      $user->username = $request->get('main_username');
      $user->name = $request->get('main_name');
      $user->email = $request->get('main_email');
      $user->type = $request->get('section_type');

      $user->update();

      return redirect()->Route('ViewMaindata')->with('success','อัพเดตข้อมูลเรียบร้อย');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $item = User::find($id);
      $item->Delete();

      return redirect()->back()->with('success','ลบข้อมูลเรียบร้อย');
    }

    public function register()  //แสดง
    {
      // dd('sdfsf');
      if(auth()->user()->type == 1){    // เช็คสิทธิ์ ในตาราง user
        return view('maindata.register');
      }else{
        abort(404);
      }

    }

    public function Saveregister(Request $request)  //บันทึก
    {
      User::create([
        'name' => $request->get('name'),
        'username' => $request->get('username'),
        'email' => $request->get('email'),
        'password' => bcrypt($request->get('password')),
        'type' => $request->get('section_type'),
      ]);

      return redirect()->Route('ViewMaindata')->with('success','อัพเดตข้อมูลเรียบร้อย');
    }
}