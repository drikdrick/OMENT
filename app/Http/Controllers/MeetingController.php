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

    public function buatRapat()
    {
        return view('v_buatrapat');
    }

    public function hasilRapat()
    {
        $meetings = DB::table('meetings')->get();

        return view('v_hasilrapat', ['meetings' => $meetings]);
    }
}
