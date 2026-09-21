<?php

namespace App\Models;

use Sakuci\Database\Model;

class Member extends Model
{
    protected static ?string $table = 'member';

    protected string $primaryKey = 'id_member';

    protected array $fillable = [ 'id_user', 'plat_nomor', 'jenis_kendaraan', 'warna', 'pemilik' ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}