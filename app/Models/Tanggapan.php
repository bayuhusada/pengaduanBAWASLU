<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    use HasFactory;

    protected $table = 'tanggapan';

    protected $primaryKey = 'id_tanggapan';

    protected $fillable = [
        'id_pengaduan',
        'tgl_tanggapan',
        'tanggapan',
        'images',
        'id_petugas'
    ];


    public function user()
    {
        return $this->hasOne(Masyarakat::class, 'id_pengaduan', 'id_pengaduan');
    }
}
