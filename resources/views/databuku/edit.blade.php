@extends('master')
@section('title','Perpustakaan')
@section('menu1','active')

@section('content')
    <style>
        .bg-green {
            background-color: green;
            color: white;
        }
    </style>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Data</h2>
                <p>Masukkan data pelajar</p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <form action="{{route('databuku.update', ['databuku' => $databuku->id])}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="mb-4">
                        <label for="judul_buku" class="form-label">Judul Buku</label>
                        <input type="text" name="judul_buku" id="judul_buku" placeholder="Masukkan judul buku" class="form-control" value="{{old('judul_buku') ?? $databuku->judul_buku}}">
                        @error('judul_buku')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nama_pengarang" class="form-label">Nama Pengarang</label>
                        <input type="text" name="nama_pengarang" id="nama_pengarang" placeholder="Masukkan nama_pengarang mobil" class="form-control" value="{{old('nama_pengarang') ?? $databuku->nama_pengarang}}">
                        @error('nama_pengarang')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="member_id" class="form-label">Pelajar</label>
                        <select name="member_id" id="member_id" class="form-control">
                            <option selected disabled>Pilih Pelajar</option>
                            @foreach($members as $member)
                            <option value="{{ $member->id }}" {{old('member_id') ?? $databuku->member_id == $member->id ? "selected" : ""}}>{{ $member->nama }}</option>
                            @endforeach
                        </select>
                        @error('member_id')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn bg-green">Edit</button>
                    <p></p>
                </form>
            </div>
        </div>
    </div>
@endsection
