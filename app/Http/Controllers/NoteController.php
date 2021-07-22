<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Controllers\MeetingController;
use App\Models\notes;
use App\Models\Documentations;
use App\Http\Controllers\TasksController;


class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function lihatCatatan($id){
        $note = notes::where('meetings_id', $id)->first();
        if (is_null($note)) {
            $note = null;
        }else {
            if ($note->users_id!=Auth::user()->id) {
                abort(403);
            }
        }
        
        return view('v_note', ['note'=>$note])->with('id', $id);
    }

    public function buatCatatan(Request $request){
        $notes = notes::firstOrNew(['meetings_id' => $request->id]);
        $notes->meetings_id = $request->id;
        $notes->users_id = Auth::user()->id;
        $notes->isi=$request->isi;
        $notes->status=null;
        $notes->save();

        if ($request->hasfile('lampiran')) {
            DB::table('documentation')->where('meetings_id', '=', $request->id)->delete();
            for ($i = 0; $i < count($request->lampiran); $i++) {
                $file = $request->lampiran[$i];
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/dokumentasi/', $name);
                
                $file = new Documentations();
                $file->Path = $name;
                $file->meetings_id = $request->id;
                $file->save();
            }
        }

        $home = new MeetingController;

        return $home->detailHasilRapat($request->id);

    }
}
