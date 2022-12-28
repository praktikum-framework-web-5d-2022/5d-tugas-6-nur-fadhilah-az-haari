@extends('master')
@section('title','Perpustakaan')
@section('menu','active')

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
                    <h2>Data Pelajar</h2>
                    <a href="{{route('member.create')}}" class="btn bg-green">Tambah</a>
                </div>
                <p>Dibawah ini merupakan data semua pelajar</p>
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
                                <th align="center" class="align-middle" rowspan="2">Nama</th>
                                <th align="center" class="align-middle" rowspan="2">NPM</th>
                                <th align="center" class="align-middle" rowspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($members as $member)
                                <tr>
                                    <td align="center">{{$loop->iteration}}</td>
                                    <td align="center">{{$member->nama}}</td>
                                    <td align="center">{{$member->npm}}</td>
                                    <td align="center "class="text-center">
                                        <form action="{{route('member.destroy',$member->id) }}" method="POST">
                                            <a href="{{route('member.edit',$member->id) }}" class="btn btn-warning">Edit</a>
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
