<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Meeting;
use App\Models\Topics;
use Illuminate\Support\Facades\Auth;

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
    public function createRapat(Request $request){
        $users=DB::table('users')->where('role', '3')->first();
        $meetings=new Meeting();
        $meetings->title=$request->judul;
        $meetings->tanggal=$request->tanggal;
        $meetings->waktu_mulai=$request->mulai;
        $meetings->waktu_akhir=$request->berakhir;
        $meetings->place=$request->tempat;
        $meetings->leader=$users->name;
        $meetings->minuter=$request->notulen;
        $meetings->created_by=Auth::user()->id;
        $meetings->save();
        if(is_array($request->field_name)){
            for($i=0; $i<count($request->field_name);$i++){
                $topics=new Topics();
                $topics->judul=$request->field_name[$i];
                $topics->meeting_id=$meetings->id;
                $topics->save();
            }
        }else{
            $topics=new Topics();
            $topics->judul=$request->field_name;
            $topics->meeting_id=$meetings->id;
            $topics->save();
        }

        if($request->hasfile('filenames'))
         {
            foreach($request->file('filenames') as $file)
            {
                $name = time().'.'.$file->extension();
                $file->move(public_path().'/files/', $name);  
                $data[] = $name;  
            }
         }


         $file= new File();
         $file->filenames=json_encode($data);
         $file->save();
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
