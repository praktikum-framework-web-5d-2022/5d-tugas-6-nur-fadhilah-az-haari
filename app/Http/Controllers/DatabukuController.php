<?php

namespace App\Http\Controllers;

use App\Models\Databuku;
use App\Models\Member;
use Illuminate\Http\Request;

class DatabukuController extends Controller
{
    public function index(){
        $databukus = Databuku::get();
        return view('databuku.index', compact('databukus'));
    }

    public function create(){
        $members = Member::all();
        return view('databuku.create', compact('members'));
    }

    public function store(Request $request){
        $validate = $request->validate([
            'judul_buku' => 'required',
            'nama_pengarang' => 'required',
            'member_id' => 'required|numeric'
        ]);

        Databuku::create($validate);
        return redirect() -> route('databuku.index') -> with('message', "Data Buku {$validate['judul_buku']} berhasil ditambahkan");
    }

    public function destroy(Databuku $databuku){
        $databuku->delete();
        return redirect()->route('databuku.index') -> with('message', "Data Buku {$databuku->judul_buku} berhasil dihapus");
    }

    public function edit(Databuku $databuku){
        $members = Member::all();
        return view('databuku.edit', compact('databuku', 'members'));
    }

    public function update(Request $request, Databuku $databuku){
        $validate = $request->validate([
            'judul_buku' => 'required',
            'nama_pengarang' => 'required',
            'member_id' => 'required|numeric'
        ]);

        $databuku -> update($validate);

        return redirect() -> route('databuku.index') -> with('message', "Data databuku $databuku->judul_buku berhasil diubah");
    }

    public function show(Databuku $databuku)
    {
        return view('databuku.show', compact('databuku'));
    }
}
