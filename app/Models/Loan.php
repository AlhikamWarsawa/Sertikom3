<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'members_name',
        'books_name',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'members_name');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'books_name');
    }
}
