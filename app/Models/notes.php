<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notes extends Model
{
    use HasFactory;

    protected $table = 'notes';
    public $timestamps= true;

    protected $fillable=[
        'users_id',
        'meetings_id',
        'isi',
        'create_at',
        'update_at'
    ];
}
