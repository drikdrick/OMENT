<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Models\notes;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function lihatCatatan($id){
        return view('v_note')->with('meetings_id', $id);
    }

    public function buatCatatan(Request $request, $id){
        $notes = new notes();
        $notes->meetings_id = $id;
        $notes->users_id = Auth::user()->id;
        $notes->isi=$request->isi;
        $notes->save();

        $home = new HomeController;

        return $home->index();

    }
}
