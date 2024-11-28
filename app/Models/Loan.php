<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'members_id',
        'books_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
        'returned_at',
    ];

    protected $dates = [
        'tanggal_pinjam',
        'tanggal_kembali',
        'returned_at',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'members_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'books_id');
    }
}
