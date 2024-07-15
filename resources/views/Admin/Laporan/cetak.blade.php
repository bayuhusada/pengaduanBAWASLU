<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
            integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <title>Laporan Pengaduan</title>
</head>
<body>
    <div class="text-center">
        <h4>Laporan Pengaduan</h4>
        <h5>BAWASLU Kabupaten Kupang</h5>
        <h6>Jln. Timor Raya KM 36-Oelamasi, Nusa Tenggara Timur</h6>
    </div>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Isi laporan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengaduan as $k => $v )
                    <tr>
                        <td>{{ $k += 1}}</td>
                        <td>{{$v->tgl_pengaduan->format('d-M-Y') }} </td>
                        <td>{{$v->isi_laporan}} </td>
                        <td>{{ $v->status == '0' ? 'pending' : ucwords($v->status) }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
