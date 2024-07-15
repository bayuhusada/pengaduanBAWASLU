@extends('layouts.admin')

@section('title', 'Detail Masyarakat')

@section('css')

    <style>
        .text-primary:hover{
            text-decoration: underline;
        }
        .text-grey{
            color: #6c757dc;
        }
        .text-grey:hover{
            color: #6c757dc;
        }

    </style>

@endsection

@section('header')
    <a href="{{ route('masyarakat.index') }}" class="color= #3D0C11">Data Masyarakat</a>
    <a href="#" class="text-grey">/</a>
    <a href="#" class="text-grey">Detail Masyarakat</a>
@endsection

@section('content')
    <div class="row" style="position:relative">
        <div class="col-lg-6 col-16">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        Detail Masyarakat
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>NIK</th>
                                <td>:</td>
                                <td>{{ $masyarakat->nik }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>:</td>
                                <td>{{ $masyarakat->nama }}</td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>:</td>
                                <td>{{ $masyarakat->username }}</td>
                            </tr>
                            <tr>
                                <th>No Telp</th>
                                <td>:</td>
                                <td>{{ $masyarakat->telp }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <form action="{{ route('masyarakat.destroy', $masyarakat->nik)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-3" style="width: 100%">HAPUS DATA</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
