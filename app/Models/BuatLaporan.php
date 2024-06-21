<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuatLaporan extends Model
{
    use HasFactory;

    protected $table = 'aduan';
    protected $primaryKey = 'id_aduan';
    public $incrementing = true;
    protected $fillable = [
        'user_id',
        'alamat',
        'tanggal_kejadian',
        'pesan',
        'bukti_kejadian',
        'status',
        'komentar',
        'bukti_solved',
        'cluster'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
