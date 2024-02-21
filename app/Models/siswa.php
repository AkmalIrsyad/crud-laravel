<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $table = "siswa"; // agar tidak muncul huruf "S" SQLSTATE[42S02]: Base table or view not found: 1146 Table 'laravel9.siswas' doesn't exist
    protected $fillable = ['nomor_induk','nama','alamat','foto']; // isiian yang diperbolehkan dengan kolom menggunakan fillable
}
