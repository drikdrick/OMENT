<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function hasilRapat()
    {
        $meetings = DB::table('meetings')->get();
        return view('v_hasilrapat', ['meetings' => $meetings]);
    }

    public function buatRapat(){
        $users=DB::table('users')->where('role', '3')->get();
        return view('v_buatrapat', ['users' => $users]);
    }

    public function detailRapat($id)
    {
        if (!$meetings = DB::table('meetings')->find($id)) {
            abort(404);
        } 
        $meetings = DB::table('meetings')->find($id);

        return view('v_hasilrapatdetail', ['meetings' => $meetings]);
    }

    public function deleteRapat($id)
    {
        if (!$meetings = DB::table('meetings')->find($id)) {
            abort(404);
        } 
        DB::table('meetings')->delete($id);
        $meetings = DB::table('meetings')->get();

        return view('v_hasilrapat', ['meetings' => $meetings]);
    }
}
