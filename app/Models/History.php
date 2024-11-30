<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'judul', 'tanggal_pinjam'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
