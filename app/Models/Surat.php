<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $fillable = [
        'user_id',
        'nomor_surat',
        'judul',
        'isi',
        'tanggal',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

