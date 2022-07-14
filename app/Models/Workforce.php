<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workforce extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'ktp', 'image_ktp', 'image_pasfoto', 'jenis_kelamin', 'status_kawin', 'agama', 'tempat_lahir', 'tanggal_lahir', 'mobile', 'alamat',
        
        'nama_sekolah', 'tingkat_pendidikan', 'jurusan', 'tahun_lulus', 'nilai_akhir', 'image_ijasah',

        'keahlian',

        'nama_pelatihan1', 'penyelenggara_pelatihan1', 'jumlah_jam1', 'tanggal_mulai_pelatihan1', 'tanggal_selesai_pelatihan1', 'image_pelatihan1',
        
        'nama_pelatihan2', 'penyelenggara_pelatihan2', 'jumlah_jam2', 'tanggal_mulai_pelatihan2', 'tanggal_selesai_pelatihan2', 'image_pelatihan2',

        'verifikasi',
    ];

    protected $casts = [
        'keahlian' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}


