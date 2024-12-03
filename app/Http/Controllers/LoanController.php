<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Loan;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $admins = Loan::latest()->paginate(5);
        return view('loans.admin', compact('admins'));
    }

    public function show($id)
    {
        $members = User::all();
        $books = Book::all();

        return view('loans.pinjam', compact('members', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'members_name' => 'required|string|exists:users,name',
            'books_name' => 'required|exists:books,judul',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date',
        ]);

        Loan::create([
            'members_name' => $request->members_name,
            'books_name' => $request->books_name,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'dipinjam',
        ]);

        return redirect()->route('loans.index')->with('success', 'Pinjaman berhasil dibuat');
    }

    public function kembali()
    {
        $loansToReturn = Loan::where('status', '!=', 'dikembalikan')->get();
        return view('loans.kembali', compact('loansToReturn'));
    }

    public function returnBook(Request $request, $id)
    {
        $request->validate([
            'tanggal_kembali' => 'required|date',
        ]);

        $loan = Loan::findOrFail($id);
        $book = Book::where('judul', $loan->books_name)->first();

        $loan->status = 'dikembalikan';
        $loan->tanggal_kembali = $request->tanggal_kembali;
        $loan->save();

        if ($book) {
            $book->stok += 1;
            $book->save();
        }

        return redirect()->route('loans.index')->with('success', 'Buku berhasil dikembalikan');
    }

    public function destroy($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->delete();
        return redirect()->route('loans.index')->with('success', 'Loan deleted successfully');
    }
    public function adminView()
    {
        $pendingLoans = Loan::where('status', 'pending')->get();
        return view('loans.confirm', compact('pendingLoans'));
    }

    public function confirm(Request $request, $id)
    {
        $request->validate([
            'tanggal_kembali' => 'required|date',
        ]);

        $loan = Loan::findOrFail($id);
        $book = Book::where('judul', $loan->books_name)->first();
        $user = User::where('name', $loan->members_name)->first();

        if ($book && $book->stok > 0) {
            $loan->status = 'dipinjam';
            $loan->tanggal_kembali = $request->tanggal_kembali;
            $loan->save();

            $book->stok -= 1;
            $book->save();

            History::create([
                'user_id' => $user->id,
                'book_id' => $book->id,
                'judul' => $book->judul,
                'status' => $book->status,
                'tanggal_pinjam' => now(),
                'tanggal_kembali' => $request->tanggal_kembali,
            ]);

            return redirect()->route('loans.index')->with('success', 'Peminjaman berhasil dikonfirmasi, stok buku berkurang, dan riwayat peminjaman dicatat.');
        }

        return redirect()->route('loans.index')->with('error', 'Gagal mengkonfirmasi peminjaman. Stok buku tidak mencukupi.');
    }
}
