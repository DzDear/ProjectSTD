<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\studentdb;

use charts;
use App\Charts\PulseChart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function index($name)
    {
        $data = studentdb::count();
        $stdMan = studentdb::where('Pname', '=', 'ชาย' )->count(); 
        $stdWoman = studentdb::where('Pname', '=', 'หญิง' )->count();


        $Mclass1 = studentdb::whereBetween('Type', [11, 17])->where('Pname', '=', 'ชาย' )->count(); //เลือกห้อง
        $Wclass1 = studentdb::whereBetween('Type', [11, 17])->where('Pname', '=', 'หญิง' )->count(); //เลือกห้อง

        $Mclass2 = studentdb::whereBetween('Type', [21, 25])->where('Pname', '=', 'ชาย' )->count(); //เลือกห้อง
        $Wclass2 = studentdb::whereBetween('Type', [21, 25])->where('Pname', '=', 'หญิง' )->count(); //เลือกห้อง

        $Mclass3 = studentdb::whereBetween('Type', [31, 36])->where('Pname', '=', 'ชาย' )->count(); //เลือกห้อง
        $Wclass3 = studentdb::whereBetween('Type', [31, 36])->where('Pname', '=', 'หญิง' )->count(); //เลือกห้อง

        $Mclass4 = studentdb::whereBetween('Type', [41, 46])->where('Pname', '=', 'ชาย' )->count(); //เลือกห้อง
        $Wclass4 = studentdb::whereBetween('Type', [41, 46])->where('Pname', '=', 'หญิง' )->count(); //เลือกห้อง

        $Mclass5 = studentdb::whereBetween('Type', [51, 55])->where('Pname', '=', 'ชาย' )->count(); //เลือกห้อง
        $Wclass5 = studentdb::whereBetween('Type', [51, 55])->where('Pname', '=', 'หญิง' )->count(); //เลือกห้อง

        $Mclass6 = studentdb::whereBetween('Type', [61, 64])->where('Pname', '=', 'ชาย' )->count(); //เลือกห้อง
        $Wclass6 = studentdb::whereBetween('Type', [61, 64])->where('Pname', '=', 'หญิง' )->count(); //เลือกห้อง

        // dd($class1);
        return view($name,compact('data','stdMan','stdWoman','Mclass1','Wclass1','Mclass2','Wclass2','Mclass3','Wclass3',
                                  'Mclass4','Wclass4','Mclass5','Wclass5','Mclass6','Wclass6'));
    }
}
