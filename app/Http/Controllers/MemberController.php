<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function index(){
        $members = Member::get();
        return view('member.index', compact('members'));
    }

    public function create(){
        return view('member.create');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'nama' => 'required',
            'npm' => 'required|numeric'
        ]);

        Member::create($validate);
        return redirect() -> route('member.index') -> with('message', "Data member {$validate['nama']} berhasil ditambahkan");
    }

    public function destroy(Member $member){
        $member->delete();
        return redirect()->route('member.index') -> with('message', "Data buku dari member {$member->nama} dihapus semuanya");
    }

    public function edit(Member $member){
        return view('member.edit', compact('member'));
    }

    public function update(Request $request, Member $member){
        $validate = $request->validate([
            'nama' => 'required',
            'no_hp' => 'required|numeric'
        ]);

        $member -> update($validate);

        return redirect() -> route('member.index') -> with('message', "Data pada buku dan member berhasil diubah");
    }

    public function show(Member $member)
    {
        return view('member.show', compact('member'));
    }
}
