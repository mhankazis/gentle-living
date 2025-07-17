<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'kode_transaksi',
        'tanggal_transaksi',
        'nama_perusahaan',
        'total_amount',
        'status'
    ];

    protected $casts = [
        'tanggal_transaksi' => 'date',
        'total_amount' => 'decimal:2',
    ];
}
