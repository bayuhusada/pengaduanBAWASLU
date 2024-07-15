<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    public function createOrUpdate( Request $request) {
        $pengaduan = Pengaduan::findOrFail($request->id_pengaduan);
        $pengaduan->update(['status' => $request->status]);

        $pengaduan = Pengaduan::where('id_pengaduan', $request->id_pengaduan)->first();

        $tanggapan = Tanggapan::where('id_pengaduan', $request->id_pengaduan)->first();





        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = public_path('storage/assets/tanggapan');
            $file->move($path, $filename);
            //hapus gambar lama jika ada
            if ($tanggapan && $tanggapan->images) {
                $oldImagePath = public_path('storage/assets/tanggapan/' . $tanggapan->images);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        } else {
            $filename = $tanggapan->images ? $tanggapan->images: '';
            // $tanggapan = Tanggapan::all();
        //     // return view('your_view_name', compact('tanggapan'));
        }




        if ($tanggapan) {
            $pengaduan->update(['status' => $request->status]);

            $tanggapan->update([
                'tgl_tanggapan' => date('Y-m-d'),
                'tanggapan' => $request->tanggapan,
                'images' => $filename,
                'id_petugas' => Auth::guard('admin')->user()->id_petugas,

            $tanggapan = Tanggapan::where('id_pengaduan', $pengaduan->id)->get(),
            ]);



            return redirect()->route('pengaduan.show', ['pengaduan' => $pengaduan, 'tanggapan' => $tanggapan])->with(['status' => 'Berhasil dikirim']);
        } else {
            $pengaduan->update(['status' => $request->status]);

            $tanggapan = Tanggapan::create([
                'id_pengaduan'=> $request->id_pengaduan,
                'tgl_tanggapan' => date('Y-m-d'),
                'tanggapan' => $request->tanggapan,
                'images' => $filename,
                'id_petugas' => Auth::guard('admin')->user()->id_petugas,
            ]);

            return redirect()->route('pengaduan.show', ['pengaduan' => $pengaduan, 'tanggapan' => $tanggapan])->with(['status' => 'Berhasil dikirim']);

        }


    }

    public function store(Request $request)
{
    $filename = '';

    $pengaduan = Pengaduan::findOrFail($request->id_pengaduan);
    $pengaduan->update(['status' => $request->status]);

    $idPetugas = Auth::guard('admin')->user()->id_petugas;

    // Find the existing Tanggapan instance for this Pengaduan instance
    $tanggapan = Tanggapan::where('id_pengaduan', $request->id_pengaduan)->first();

    if ($tanggapan) {
        // Update the existing Tanggapan instance
        $tanggapan->update([
            'tgl_tanggapan' => date('Y-m-d'),
            'tanggapan' => $request->tanggapan,
            'images' => $filename,
            'id_petugas' => $idPetugas,
        ]);
    } else {
        // Create a new Tanggapan instance if it doesn't exist
        $tanggapan = Tanggapan::create([
            'id_pengaduan'=> $request->id_pengaduan,
            'tgl_tanggapan' => date('Y-m-d'),
            'tanggapan' => $request->tanggapan,
            'images' => $filename,
            'id_petugas' => $idPetugas,
        ]);
    }

    if ($request->hasFile('images')) {
        $file = $request->file('images');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $path = public_path('storage/assets/tanggapan');
        $file->move($path, $filename);
        $tanggapan->update(['images' => 'assets/tanggapan/' . $filename]);
    }

    return redirect()->route('pengaduan.show', ['pengaduan' => $pengaduan, 'tanggapan' => $tanggapan])->with(['status' => 'Berhasil dikirim']);
}


//     public function store(Request $request)
// {


//     $filename='';


//     $pengaduan = Pengaduan::findOrFail($request->id_pengaduan);
//     $pengaduan->update(['status' => $request->status]);


//     $idPetugas = Auth::guard('admin')->user()->id_petugas;
//     $tanggapan = Tanggapan::create([
//         'id_tanggapan'=>$request->id_tanggapan,
//         'id_pengaduan'=> $request->id_pengaduan,
//         'tgl_tanggapan' => date('Y-m-d'),
//         'tanggapan' => $request->tanggapan,
//         'images' => $filename,
//         'id_petugas' => $idPetugas,
//     ]);

//     if ($request->hasFile('images')) {
//         $file = $request->file('images');
//         $extension = $file->getClientOriginalExtension();
//         $filename = time() . '.' . $extension;
//         $path = public_path('storage/assets/tanggapan');
//         $file->move($path, $filename);
//         $tanggapan->update(['images' => 'assets/tanggapan/' . $filename]);

//     }


//     return redirect()->route('pengaduan.show', ['pengaduan' => $pengaduan, 'tanggapan' => $tanggapan])->with(['status' => 'Berhasil dikirim']);
// }

}
