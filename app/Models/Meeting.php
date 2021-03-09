<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $table = 'meetings';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'tanggal',
        'waktu_mulai',
        'waktu_akhir',
        'place',
        'leader',
        'minuter',
        'created_at'
    ];
}
