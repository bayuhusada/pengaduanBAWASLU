@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

@endsection

@section('header', ' Data Petugas')

@section('content')
    <a href="{{ route('petugas.create')}}" class="btn btn-purple mb-3">Tambah Petugas</a>
    <table id="petugasTable" class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Petugas</th>
                <th>Username</th>
                <th>Telp</th>
                <th>Level</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($petugas as $k => $v)

            <tr>
                <td>{{ $k += 1 }}</td>
                <td>{{ $v->nama_petugas }}</td>
                <td>{{ $v->username }}</td>
                <td>{{ $v->telp }}</td>
                <td>{{ $v->level }}</td>
                <td> <a href="{{ route('petugas.edit', $v->id_petugas) }}" style="text-decoration: underline">Lihat</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
            new DataTable('petugasTable');

            // $(document).ready(function(){
            //     $('petugasTable').DataTable();
            // });
    </script>
@endsection
