<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BAB extends Model
{
    protected $table = 'bukti_penerimaan_surat';
    protected $primaryKey = 'id';
    protected $fillable = [
        'pengirim', 
        'alamat',
        'nomor_surat',    
        'tanggal_surat',    
        'tanggal_diterima',    
        'sifat_surat',    
        'diterima_melalui',    
        'petugas_penerima',    
        'pembuat_surat',    
        'perihal',  
        'posisi_surat',  
    ];
}
