<?php

namespace App\Http\Controllers;

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
        return view('v_hasilrapat');
    }
}
