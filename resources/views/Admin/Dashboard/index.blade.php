@extends('layouts.admin')


@section('title')

@section('title', 'Halaman Dashboard')

@section('header', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header text-white" style="background-color: #3D0C11">Petugas</div>
                <div class="card-body">
                    <div class="text-center">
                        {{ $petugas}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header text-white" style="background-color: #3D0C11">Masyarakat</div>
                <div class="card-body">
                    <div class="text-center">
                        {{ $masyarakat }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header text-white" style="background-color: #3D0C11">Pengaduan Proses</div>
                <div class="card-body">
                    <div class="text-center">
                    {{ $proses }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header text-white" style="background-color: #3D0C11">Pengaduan Selesai</div>
                <div class="card-body">
                    <div class="text-center">
                        {{ $selesai }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
