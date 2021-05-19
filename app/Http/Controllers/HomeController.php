<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $absensi->update(['absences.response' => 1]);

        return redirect()->route($this->index());        
    }

    public function tolakUndagan(){

    }
}
