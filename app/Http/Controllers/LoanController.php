<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Book::all();
        return view('loans.index', compact('loans'));
    }

    public function pinjam()
    {
        $members = User::all();
        $books = Book::all();

        // Menampilkan view form untuk pinjam buku
        return view('loans.pinjam', compact('members', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'members_name' => 'required|string|exists:users,name',
            'books_id' => 'required|exists:books,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date',
        ]);

        Loan::create([
            'members_name' => $request->members_name,
            'books_id' => $request->books_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'dipinjam',
        ]);

        return redirect()->route('loans.index')->with('success', 'Pinjaman berhasil dibuat');
    }


    public function kembali($id)
    {
        $loan = Loan::findOrFail($id);

        return view('loans.kembali', compact('loan'));
    }

    // Memproses pengembalian buku
    public function returnBook(Request $request, $id)
    {
        $request->validate([
            'tanggal_kembali' => 'required|date',
            'status' => 'required|in:dipinjam,dikembalikan',
        ]);

        $loan = Loan::findOrFail($id);

        $loan->status = 'dikembalikan';
        $loan->tanggal_kembali = $request->tanggal_kembali;

        $loan->save();

        return redirect()->route('loans.index')->with('success', 'Buku berhasil dikembalikan');
    }
}
