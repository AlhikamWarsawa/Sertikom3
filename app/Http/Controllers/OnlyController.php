<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\History;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnlyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $onlys = Book::when($search, function ($query, $search) {
            return $query->where('judul', 'like', "%{$search}%")
                ->orWhere('penulis', 'like', "%{$search}%")
                ->orWhere('kategori', 'like', "%{$search}%");
        })->paginate(12);

        return view('onlys.index', compact('onlys'));
    }

    public function borrow($id)
    {
        $book = Book::findOrFail($id);
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in to borrow a book.');
        }

        if ($book->stok > 0 && $book->status !== 0) {
            Loan::create([
                'members_name' => $user->name,
                'books_name' => $book->judul,
                'tanggal_pinjam' => now(),
                'status' => 'pending',
            ]);

            return redirect()->route('onlys.index')->with('success', 'Permintaan peminjaman buku berhasil. Menunggu konfirmasi admin.');
        }

        return redirect()->route('onlys.index')->with('error', 'Buku tidak tersedia untuk dipinjam.');
    }

    public function history()
    {
        $histories = History::where('user_id', Auth::id())->orderBy('tanggal_pinjam', 'desc')->get();
        return view('onlys.history', compact('histories'));
    }

    public function notifications()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in to view notifications.');
        }

        $notifications = Loan::where('members_name', $user->name)
            ->where('status', '!=', 'Dikembalikan')
            ->with('book')
            ->get()
            ->map(function ($loan) {
                $loan->days_left = now()->diffInDays($loan->tanggal_kembali, false);
                return $loan;
            });

        return view('onlys.notification', compact('notifications'));
    }

    public function memberDashboard()
    {
        $user = Auth::user();
        $borrowedBooksCount = Loan::where('members_name', $user->name)->where('status', 'dipinjam')->count();
        $availableBooksCount = Book::where('stok', '>', 0)->count();
        $totalBorrowings = Loan::where('members_name', $user->name)->count();
        $borrowedBooks = Loan::where('members_name', $user->name)
            ->where('status', 'dipinjam')
            ->with('book')
            ->get();

        return view('member_dashboard', compact('borrowedBooksCount', 'availableBooksCount', 'totalBorrowings', 'borrowedBooks'));
    }
}
