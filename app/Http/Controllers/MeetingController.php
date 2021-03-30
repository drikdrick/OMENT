<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Meeting;
use App\Models\Topics;
use App\Models\Attachments;
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
        $users=DB::table('users')->where('role', '2')->first();
        $meetings->title=$request->judul;
        $meetings->tanggal=$request->tanggal;
        $meetings->waktu_mulai=$request->mulai;
        $meetings->waktu_akhir=$request->berakhir;
        $meetings->place=$request->tempat;
        $meetings->leader=$users->name;
        $meetings->minuter=$request->notulen;
        $meetings->created_by=Auth::user()->id;
        $meetings->save();
        for($i=0; $i<count($request->field_name);$i++){
            $topics=new Topics();
            $topics->judul=$request->field_name[$i];
            $topics->meeting_id=$meetings->id;
            $topics->save();
        }

        $data;
        if($request->hasfile('lampiran'))
         {
            foreach($request->file('lampiran') as $file)
            {
                $name = time().'.'.$file->extension();
                $file->move(public_path().'/files/', $name);  
                $data[] = $name;  
            }
         }
         for($i=0; $i<count($data);$i++){
            $file= new Attachments();
            $file->Path=$data[$i];
            $file->meetings_id=$meetings->id;
            $file->save();
        }
         return $this->hasilRapat();
    }
    public function detailRapat($id)
    {
        if (!$meetings = DB::table('meetings')->find($id)) {
            abort(404);
        } 
        $meetings = DB::table('meetings')->where('meetings.id', $id)->first();
        $lampiran = DB::table('attachments')->join('meetings', 'meetings.id','=','attachments.meetings_id')
        ->where('meetings.id', $id)->get();
        $topik = DB::table('topics')->join('meetings', 'meetings.id','=','topics.meeting_id')
        ->where('meetings.id', $id)->get();
        $notulens = DB::table('users')->where('users.id', $meetings->minuter)->first();  

        return view('v_hasilrapatdetail', ['meetings' => $meetings, 'lampirans'=>$lampiran, 'topik'=>$topik, 'notulen'=>$notulens]);
    }

    public function deleteRapat($id)
    {
        if (!$meetings = DB::table('meetings')->find($id)) {
            abort(404);
        } 
        DB::table('meetings')->delete($id);

        return $this->hasilRapat();
    }

    public function editRapat($id)
    {
        if (!$meetings = DB::table('meetings')->find($id)) {
            abort(404);
        }

        $meetings = DB::table('meetings')->where('meetings.id',$id)->first();
        $users=DB::table('users')->where('role', '3')->get();
        $topik = DB::table('topics')->join('meetings', 'meetings.id','=','topics.meeting_id')
        ->where('meetings.id', $id)->get();
        return view('v_editrapat', ['meetings'=>$meetings, 'users'=>$users]);
    }

    public function updateRapat(Request $request, Meetings $meetings)
    {
        $meetings->update($request->all());

        return redirect()->route($this->hasilRapat());
    }
}
