<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Meeting;
use App\Models\Topics;
use App\Models\Attachments;
use App\Models\Absence;
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
        $meetings = DB::table('meetings')
        ->join('users', 'meetings.minuter', '=', 'users.id')
        ->select('meetings.*', 'users.name')
        ->get();
        return view('v_hasilrapat', ['meetings' => $meetings]);
    }

    public function buatRapat()
    {
        $users = DB::table('users')->where('role', '3')->get();
        return view('v_buatrapat', ['users' => $users]);
    }
    public function createRapat(Request $request)
    {
        $kaprodi = DB::table('users')->where('role', '2')->first();
        $users = DB::table('users')->where('role', '!=', '1')->get();
        $meetings = new Meeting();
        $meetings->title = $request->judul;
        $meetings->tanggal = $request->tanggal;
        $meetings->waktu_mulai = $request->mulai;
        $meetings->waktu_akhir = $request->berakhir;
        $meetings->place = $request->tempat;
        $meetings->leader = $kaprodi->id;
        $meetings->minuter = $request->notulen;
        $meetings->created_by = Auth::user()->id;
        $meetings->save();
        for ($i = 0; $i < count($request->field_name); $i++) {
            $topics = new Topics();
            $topics->judul = $request->field_name[$i];
            $topics->meeting_id = $meetings->id;
            $topics->save();
        }

        if ($request->hasfile('lampiran')) {
            $data;
            foreach ($request->file('lampiran') as $file) {
                $name = time() . '.' . $file->extension();
                $file->move(public_path() . '/files/', $name);
                $data[] = $name;
            }
            for ($i = 0; $i < count($data); $i++) {
                $file = new Attachments();
                $file->Path = $data[$i];
                $file->meetings_id = $meetings->id;
                $file->save();
            }
        }

        foreach ($users as $item) {
            $absence = new Absence();
            $absence->users_id=$item->id;
            $absence->meetings_id=$meetings->id;
            $absence->save();
        }
        return $this->hasilRapat();
    }
    public function detailRapat($id)
    {
        if (!$meetings = DB::table('meetings')->find($id)) {
            abort(404);
        }
        $meetings = DB::table('meetings')->where('meetings.id', $id)->first();
        $lampiran = DB::table('attachments')->join('meetings', 'meetings.id', '=', 'attachments.meetings_id')
            ->where('meetings.id', $id)->get();
        $topik = DB::table('topics')->join('meetings', 'meetings.id', '=', 'topics.meeting_id')
            ->where('meetings.id', $id)->get();
        $notulens = DB::table('users')->where('users.id', $meetings->minuter)->first();
        $leaders = DB::table('users')->where('users.id', $meetings->leader)->first();

        return view('v_hasilrapatdetail', ['meetings' => $meetings, 'lampirans' => $lampiran, 'topik' => $topik, 'notulen' => $notulens, 'leaders' => $leaders]);
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

        $meetings = DB::table('meetings')->where('meetings.id', $id)->first();
        $users = DB::table('users')->where('role', '3')->get();
        $topik = DB::table('topics')->join('meetings', 'meetings.id', '=', 'topics.meeting_id')
            ->where('meetings.id', $id)->get();
        return view('v_editrapat', ['meetings' => $meetings, 'users' => $users]);
    }

    public function updateRapat(Request $request, Meeting $meetings)
    {
        $meetings->update($request->all());

        return redirect()->route($this->hasilRapat());
    }

    public function anggotaRapat($id){
        $anggota = DB::table('absences')
        ->join('users', 'absences.users_id', '=', 'users.id')
        ->join('meetings', 'absences.meetings_id', '=', 'meetings.id')
        ->select('absences.*', 'users.name', 'meetings.title', 'meetings.tanggal', 'meetings.waktu_mulai')
        ->where('absences.meetings_id', $id)
        ->get();

        return view('v_anggotaRapat', ['anggota'=>$anggota]);
    }
}
