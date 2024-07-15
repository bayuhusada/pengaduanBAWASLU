@extends('layouts.user')

@section('css')
<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
@endsection

@section('title', 'BAWASLU - Pengaduan Masyarakat')

@section('content')
{{-- Section Header --}}
<section class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
        <div class="container">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <h4 class="semi-bold mb-0 text-white">BAWASLU Kabupaten Kupang</h4>
                    <p class="italic mt-0 text-white">Pengaduan Masyarakat</p>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    @if(Auth::guard('masyarakat')->check())
                    <ul class="navbar-nav text-center ml-auto">
                        <li class="nav-item">
                            <a class="nav-link ml-3 text-white" href="{{ route('pekat.laporan') }}">Laporan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ml-3 text-white" style="text-decoration: none">{{ Auth::guard('masyarakat')->user()->nama }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ml-3 text-white" href="{{ route('pekat.logout') }}"
                                style="text-decoration: none">❌</a>
                        </li>
                    </ul>
                    @else
                    <ul class="navbar-nav text-center ml-auto">
                        <li class="nav-item">
                            <button class="btn text-white" type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#loginModal">Masuk</button>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pekat.formRegister') }}" class="btn btn-outline-purple">Daftar</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.formLogin') }}" class="btn text-white ">Admin</a>
                        </li>
                    </ul>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="text-center">
        <h2 class="medium text-white mt-3">Layanan Pengaduan Masyarakat</h2>
        <p class="italic text-white mb-5">Sampaikan laporan Anda langsung kepada yang pemerintah berwenang</p>
    </div>

    <div class="wave wave1"></div>
    <div class="wave wave2"></div>
    <div class="wave wave3"></div>
    <div class="wave wave4"></div>
</section>
{{-- Section Card Pengaduan --}}
{{-- <div class="row justify-content-center">
    <div class="col-lg-6 col-10 col">
        <div class="content shadow">

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

            @if (Session::has('pengaduan'))
                <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('pengaduan') }}</div>
            @endif

            <div class="card mb-3">Tulis Laporan Disini</div>
            <form action="{{ route('pekat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <textarea name="isi_laporan" placeholder="Masukkan Isi Laporan" class="form-control"
                        rows="4">{{ old('isi_laporan') }}</textarea>
                </div>
                <div class="form-group">
                    <input type="file" name="foto" class="form-control">
                </div>
                <button type="submit" class="btn btn-custom mt-2">Kirim</button>
            </form>
        </div>
    </div>
</div> --}}


{{-- landing page start--}}

<div>


<div class="row row-cols-1 row-cols-md-3 g-2">
    <div class="col">
      <div class="card">
        <img src="{{ asset('images/1.jpeg') }}" class="card-img-top" style="height:350px;" alt="...">
        <div class="card-body">
          <h5 class="card-title"> Jalan Dinas</h5>
          <p class="card-text">Perjalanan Dinas ke Kecamatan Kupang Barat bersama Ketua Bawaslu</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <img src="{{ asset('images/2.jpeg') }}" class="card-img-top" style="height:350px;" alt="...">
        <div class="card-body">
          <h5 class="card-title">Jalan Dinas</h5>
          <p class="card-text">Perjalan Dinas ke semau bersama semua petugas Bawaslu Kabupaten.</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <img src="{{ asset('images/3.jpeg') }}" class="card-img-top" style="height:350px;" alt="...">
        <div class="card-body">
          <h5 class="card-title">Aplikasi</h5>
          <p class="card-text">Penyerahan Aplikasi/Web </p>
        </div>
      </div>
    </div>

</div>
{{-- landing page end--}}


{{-- Footer --}}
<footer>
<div class="mt-5">
    <hr style="fill-rule: ">
    <div class="text-center">
        <p class="italic text-secondary">© BAYU HUSADA</p>
    </div>
</div>
</footer>
{{-- Modal --}}
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="mt-3">Masuk terlebih dahulu</h3>
                <p>Silahkan masuk menggunakan akun yang sudah didaftarkan.</p>
                <form action="{{ route('pekat.login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" autocomplete="off" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-purple text-white mt-3" style="width: 100%">MASUK</button>
                </form>
                @if (Session::has('pesan'))
                <div class="alert alert-danger mt-2">
                    {{ Session::get('pesan') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    @if (Session::has('pesan'))
    <script>
        $('#loginModal').modal('show');

    </script>
    @endif
@endsection
