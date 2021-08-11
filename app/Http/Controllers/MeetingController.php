<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Meeting;
use App\Models\Topics;
use App\Models\Attachments;
use App\Models\Absence;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\TasksController;
use Carbon\Carbon;
use App\Mail\MeetingInvitation;
use App\Mail\MeetingUpdated;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\ServiceProvider;
use PDF;

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
        ->join('notes', 'meetings.id', '=', 'notes.meetings_id')
        ->select('meetings.*', 'users.name')
        ->orderBy('meetings.tanggal', 'desc')
        ->orderBy('meetings.waktu_mulai', 'desc')
        ->where('notes.status', true)
        ->get();
        if (Auth::user()->role==2) {
            $meetings = DB::table('meetings')
            ->join('users', 'meetings.minuter', '=', 'users.id')
            ->join('notes', 'meetings.id', '=', 'notes.meetings_id')
            ->orderBy('meetings.tanggal', 'desc')
            ->orderBy('meetings.waktu_mulai', 'desc')
            ->select('meetings.*', 'users.name')
            ->get();
        }
        return view('v_hasilrapat', ['meetings' => $meetings]);
    }

    public function jadwalRapat()
    {
        $meetings = DB::table('meetings')
        ->join('users', 'meetings.minuter', '=', 'users.id')
        // ->join('notes', 'meetings.id', '=', )
        ->select('meetings.*', 'users.name')
        ->orderBy('meetings.tanggal', 'desc')
        ->orderBy('meetings.waktu_mulai', 'desc')
        ->get();
        $now = Carbon::now();
        return view('v_jadwal', ['meetings' => $meetings, 'now' => $now]);
    }

    public function buatRapat()
    {
        $users = DB::table('users')->where('role', '3')
        ->orderBy('name', 'asc')->get();
        $meetings = DB::table('meetings')->latest()->first();
        return view('v_buatrapat', ['users' => $users, 'meetings' => $meetings]);
    }
    public function createRapat(Request $request)
    {
        $kaprodi = DB::table('users')->where('role', '2')->first();
        $users = DB::table('users')
        ->where('role', '=', '3')
        ->orderBy('name', 'asc')
        ->get();
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
            for ($i = 0; $i < count($request->lampiran); $i++) {
                $file = $request->lampiran[$i];
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/files/', $name);
                
                $file = new Attachments();
                $file->Path = $name;
                $file->meetings_id = $meetings->id;
                $file->save();
            }
        }

        foreach ($users as $item) {
            $absence = new Absence();
            $absence->users_id=$item->id;
            $absence->meetings_id=$meetings->id;
            Mail::to($item->email)->send(new MeetingInvitation($meetings));
            $absence->save();
        }

        flash('Rapat berhasil dibuat.')->success();
        return $this->jadwalRapat();
    }
    public function detailJadwalRapat($id)
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
        $result = DB::table('notes')->where('meetings_id', $id)->first();
        $dokumentasi = DB::table('documentation')->where('meetings_id', $id)->get();
        $now = Carbon::now();

        return view('v_incomingrapat', ['meetings' => $meetings, 'lampirans' => $lampiran, 'topik' => $topik, 'notulen' => $notulens, 'leaders' => $leaders, 'result' => $result, 'dokumentasi' => $dokumentasi, 'now'=>$now]);
    }

    public function detailHasilRapat($id)
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
        $result = DB::table('notes')->where('meetings_id', $id)->first();
        $dokumentasi = DB::table('documentation')->where('meetings_id', $id)->get();

        return view('v_hasilrapatdetail', ['meetings' => $meetings, 'lampirans' => $lampiran, 'topik' => $topik, 'notulen' => $notulens, 'leaders' => $leaders, 'result' => $result, 'dokumentasi' => $dokumentasi]);
    }

    public function deleteRapat($id)
    {
        if (!$meetings = DB::table('meetings')->find($id)) {
            abort(404);
        }
        DB::table('meetings')->delete($id);

        flash('Rapat telah dihapus.')->error();
        return $this->jadwalRapat();
    }

    public function editRapat($id)
    {
        if (!$meetings = DB::table('meetings')->find($id)) {
            flash('Maaf, rapat tidak ditemukan.')->error();
            return back();
        }

        $meetings = DB::table('meetings')->where('meetings.id', $id)->first();
        $now = Carbon::now();

        if ($meetings->tanggal <= $now) {
            if ($meetings->waktu_mulai <= $now) {
                flash('Maaf, rapat yang dipilih telah berlangsung.');
                return back();
            }
        }
        $users = DB::table('users')->where('role', '3')->get();
        $topik = DB::table('topics')->join('meetings', 'meetings.id', '=', 'topics.meeting_id')
            ->where('meetings.id', $id)->get();
        return view('v_editrapat', ['meetings' => $meetings, 'users' => $users]);
    }

    public function updateRapat(Request $request)
    {
        $meetings = Meeting::find($request->id);
        $meetings->title = $request->judul;
        $meetings->tanggal = $request->tanggal;
        $meetings->waktu_mulai = $request->mulai;
        $meetings->waktu_akhir = $request->berakhir;
        $meetings->place = $request->tempat;
        $meetings->leader = Auth::user()->id;
        $meetings->minuter = $request->notulen;
        $meetings->save();

        if ($request->hasfile('lampiran')) {
            DB::table('attachments')->where('meetings_id', '=', $request->id)->delete();

            for ($i = 0; $i < count($request->lampiran); $i++) {
                $file = $request->lampiran[$i];
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/files/', $name);
                
                $file = new Attachments();
                $file->Path = $name;
                $file->meetings_id = $request->id;
                $file->save();
            }
        }
        
        $users = DB::table('users')
        ->where('role', '=', '3')
        ->orderBy('name', 'asc')
        ->get();
        DB::table('absences')->where('meetings_id', '=', $request->id)->delete();
        foreach ($users as $item) {
            $absence = new Absence();
            $absence->users_id=$item->id;
            $absence->meetings_id=$meetings->id;
            Mail::to($item->email)->send(new MeetingUpdated($meetings));
            $absence->save();
        }
        flash('Rapat berhasil diperbaharui.')->warning();
        return $this->jadwalRapat();
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

    public function printPdf($id){
        if (!$meetings = DB::table('meetings')->find($id)) {
            abort(404);
        }
        $meetings = DB::table('meetings')->where('meetings.id', $id)->first();
        // $day = Carbon::parse($$meetings->tanggal)->format('l');
        $topics = DB::table('topics')->join('meetings', 'meetings.id', '=', 'topics.meeting_id')
            ->where('meetings.id', $id)->get();
        $notulens = DB::table('users')->where('users.id', $meetings->minuter)->first();
        $leaders = DB::table('users')->where('users.id', $meetings->leader)->first();
        $results = DB::table('notes')->where('meetings_id', $id)->first();
        $documentations = DB::table('documentation')->where('meetings_id', $id)->get();
        $member = DB::table('absences')
        ->join('users', 'absences.users_id', '=', 'users.id')
        ->select('absences.*', 'users.name')
        ->where('absences.meetings_id', $id)
        ->where('absences.respon', 2)
        ->get();

        return view('mom', ['meeting' => $meetings, 'topik' => $topics, 'notulen' => $notulens, 'leader' => $leaders, 'result' => $results, 'dokumentasi' => $documentations, 'anggota' => $member]);
    }
}
