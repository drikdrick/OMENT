<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;
    protected $table = 'absences';
    public $timestamps = true;
    protected $fillable = [
        'users_id',
        'meetings_id',
        'respon',
        'absen',
        'update_by',
        'created_at',
        'updated_by'
    ];
}
