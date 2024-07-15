<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MasyarakatController extends Controller
{
    public function index() {

        $masyarakat = Masyarakat::all();

        return view('Admin.Masyarakat.index', ['masyarakat' => $masyarakat]);

    }

    public function show($nik){

        $masyarakat = Masyarakat::where('nik', $nik)->first();

        return view('Admin.Masyarakat.show',['masyarakat' => $masyarakat]);

    }

    public function destroy($nik){

        $nik = Masyarakat::findOrfail($nik);

        $nik->delete();
        return redirect()->route('masyarakat.index');
    }


}
