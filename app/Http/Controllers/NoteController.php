<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $notes->save();

        if ($request->hasfile('lampiran')) {
            $data;
            foreach ($request->file('lampiran') as $file) {
                $name = time() . '.' . $file->extension();
                $file->move(public_path() . '/files/', $name);
                $data[] = $name;
            }
            for ($i = 0; $i < count($data); $i++) {
                $file = new Documentations();
                $file->Path = $data[$i];
                $file->meetings_id = $id;
                $file->save();
            }
        }

        $home = new MeetingController;

        return $home->detailHasilRapat($request->id);

    }
}
