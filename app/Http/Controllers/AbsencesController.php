<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Absence;
use App\Http\Controllers\MeetingController;

class AbsencesController extends Controller
{
    public function index(){
        $meetings = DB::table('absences')
        ->join('meetings', 'absences.meetings_id', '=', 'meetings.id')
        ->join('users', 'meetings.minuter', '=', 'users.id')
        ->select('meetings.*', 'users.name')
        ->where('absences.users_id', Auth::user()->id)
        ->where('absences.absen',1)
        ->get();
        return view('v_daftarHadir', ['meetings' => $meetings]);
    }
    public function buatAbsensi($id){
        if (!$meetings = DB::table('meetings')->find($id)) {
            abort(404);
        }
        $dataDosen = DB::table('absences')
        ->join('users', 'users.id', '=', 'absences.users_id')
        ->where('meetings_id', $id)
        ->get();
        $meetings = DB::table('meetings')->find($id);
        return view('v_absen', ['datas'=>$dataDosen, 'meeting'=>$meetings]);
    }

    public function inputAbsensi(Request $request, $id){
        if (!$meetings = DB::table('meetings')->find($id)) {
            abort(404);
        }
        if (is_null($request->dataAbsen)) {
            abort(500, 'Daftar absen tidak boleh kosong');
        }
        DB::table('absences')
        ->where('meetings_id', $id)
        ->update(['respon' => 0]);

        for ($i = 0; $i < count($request->dataAbsen); $i++) {
            DB::table('absences')
            ->where('meetings_id', $id)
            ->where('users_id', $request->dataAbsen[$i])
            ->update(['respon' => 2]);
        }
        
        $home = new MeetingController;

        flash('Absensi berhasil direkam.')->success();
        return $home->detailJadwalRapat($request->id); 
    }
}
