@extends('master')
@section('title','Perpustakaan')
@section('menu1','active')

@section('content')
    <style>
        .bg-green {
            background-color: green;
            color: white;
        }
        .text-green {
            color: green;
            font-weight: bold
        }
    </style>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h2>Data Buku</h2>
                    <a href="{{route('databuku.create')}}" class="btn bg-green">Tambah</a>
                </div>
                <p>Dibawah ini merupakan data semua data buku</p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" align="center">
                        <thead>
                            <tr align="center">
                                <th align="center" class="align-middle" rowspan="2">#</th>
                                <th align="center" class="align-middle" rowspan="2">Judul Buku</th>
                                <th align="center" class="align-middle" rowspan="2">Nama Pengarang</th>
                                <th align="center" class="align-middle" rowspan="2">Pelajar</th>
                                <th align="center" class="align-middle" rowspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($databukus as $databuku)
                                <tr>
                                    <td align="center">{{$loop->iteration}}</td>
                                    <td align="center">{{$databuku->judul_buku}}</td>
                                    <td align="center">{{$databuku->nama_pengarang}}</td>
                                    <td align="center">{{$databuku->members->nama}}</td>
                                    <td align="center "class="text-center">
                                        <form action="{{ route('databuku.destroy',$databuku->id) }}" method="POST">
                                            <a href="{{ route('databuku.edit',$databuku->id) }}" class="btn btn-warning">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="11">Tidak ada data...</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
