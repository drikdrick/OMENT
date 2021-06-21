<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsencesController extends Controller
{
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
}
