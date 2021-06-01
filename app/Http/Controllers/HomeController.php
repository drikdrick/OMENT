<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Absence;

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
    public function index()
    {
        $absensi = DB::table('absences')
        ->join('meetings', 'absences.meetings_id', '=', 'meetings.id')
        ->select('absences.*', 'meetings.title', 'meetings.tanggal', 'meetings.waktu_mulai', 'meetings.place')
        ->where('users_id', Auth::user()->id)
        ->where('respon', NULL)
        ->get();
        return view('v_dashboard',['undangan'=>$absensi]);
    }

    public function terimaUndangan($id){
        $absensi = DB::table('absences')
        ->where('users_id', Auth::user()->id)
        ->where('meetings_id', $id)
        ->update(['respon'=>1, 'updated_at'=>now()]);

        return $this->index();        
    }

    public function tolakUndangan($id){
        $absensi = DB::table('absences')
        ->where('users_id', Auth::user()->id)
        ->where('meetings_id', $id)
        ->update(['respon'=>0]);

        return $this->index();    
    }
}
