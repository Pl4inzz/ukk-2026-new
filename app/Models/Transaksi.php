<?php

namespace App\Models;

use Sakuci\Database\Model;

class Transaksi extends Model
{
    // Nama tabel di database
    protected static ?string $table = 'transaksi';

    // Primary Key utama tabel transaksi
    protected string $primaryKey = 'id_parkir';

    // Kolom-kolom yang dapat diisi melalui mass assignment (Create/Update)
    protected array $fillable = [
        'id_user',
        'id_tarif',
        'id_area',
        'id_kendaraan',
        'waktu_masuk',
        'waktu_keluar',
        'durasi_jam',
        'biaya_total',
        'status',
        'created_at',
        'updated_at'
    ];

    /**
     * Relasi ke Model User (Petugas/Admin yang mencatat transaksi)
     */
    public function user()
    {
        // belongsTo(ModelTujuan, foreign_key_di_transaksi, primary_key_di_users)
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    /**
     * Relasi ke Model Tarif (Mengetahui jenis kendaraan & tarif per jam)
     */
    public function tarif()
    {
        return $this->belongsTo(Tarif::class, 'id_tarif', 'id_tarif');
    }

    /**
     * Relasi ke Model AreaParkir (Mengetahui lokasi/area kendaraan diparkir)
     */
    public function areaParkir()
    {
        return $this->belongsTo(AreaParkir::class, 'id_area', 'id_area');
    }

    /**
     * Relasi ke Model Member (Mengetahui data kendaraan jika terdaftar sebagai member)
     */
    public function member()
    {
        return $this->belongsTo(Member::class, 'id_kendaraan', 'id_member');
    }
}