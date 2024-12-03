<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function index()
    {
        $members = User::latest()->paginate(5);
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'anggota',
        ]);

        return redirect()->route('members.index');
    }

    public function edit($id)
    {
        $member = User::findOrFail($id);
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
        ]);

        $member = User::findOrFail($id);
        $member->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $member->password,
        ]);

        return redirect()->route('members.index');
    }

    public function destroy($id)
    {
        DB::beginTransaction();
            $member = User::findOrFail($id);
            History::where('user_id', $id)->delete();
            $member->delete();

            DB::commit();
            return redirect()->route('members.index')->with('success', 'Member deleted successfully');
    }
}
