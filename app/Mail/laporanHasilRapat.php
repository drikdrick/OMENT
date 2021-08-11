<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Meeting;
use Illuminate\Support\Facades\DB;

class laporanHasilRapat extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $id;
    public $judul;
    public $ketua;
    public $notulis;
    public $tanggal;
    public $waktu;
    public $tempat;

    public function __construct($meetings)
    {
        $ketuaRapat = DB::table('users')->where('id', $meetings->leader)->first();
        $notulisRapat = DB::table('users')->where('id', $meetings->minuter)->first();
        $this->id = $meetings->id;
        $this->judul = $meetings->title;
        $this->tanggal = $meetings->tanggal;
        $this->waktu = $meetings->waktu_mulai;
        $this->tempat = $meetings->place;
        $this->ketua = $ketuaRapat->name;
        $this->notulis = $notulisRapat->name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('omentdel@gmail.com')
                    ->view('emailPublish')
                    ->with(
                     [
                         'id' => $this->id,
                         'judul' => $this->judul,
                         'tanggal' => $this->tanggal,
                         'waktu' => $this->waktu,
                         'tempat' => $this->tempat,
                         'ketua' => $this->ketua,
                         'notulis' => $this->notulis,
                     ]);
    }
}
