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

        if ($book->stok > 0) {
            $book->stok -= 1;
            $book->save();

            History::create([
                'user_id' => Auth::id(),
                'book_id' => $book->id,
                'judul' => $book->judul,
                'tanggal_pinjam' => now(),
            ]);

            return redirect()->route('onlys.index')->with('success', 'Buku berhasil dipinjam.');
        }

        return redirect()->route('onlys.index')->with('error', 'Stok buku habis.');
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
}
