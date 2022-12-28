@extends('master')
@section('title','Perpustakaan')
@section('menu','active')

@section('content')
    <style>
        .bg-green {
            background-color: green;
            color: white;
        }
        .bt-green{
            background-color: green;
            color: white;
        }
    </style>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <h2>Tambah Data</h2>
                <p>Masukkan data dengan benar</p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <form action="{{route('member.store')}}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama member" class="form-control" value="{{old('nama')}}">
                        @error('nama')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="npm" class="form-label">NPM</label>
                        <input type="text" name="npm" id="npm" placeholder="Masukkan NPM" class="form-control" value="{{old('npm')}}">
                        @error('npm')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn bt-green">Tambah</button>
                    <p></p>
                </form>
            </div>
        </div>
    </div>
@endsection
