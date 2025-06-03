<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeWork extends Model
{
    use HasFactory;

    protected $table = 'homework';

    protected $fillable = [
        'nama_latihan',
        'kategori',
        'alat',
        'deskripsi',
        'image',
        'sets',
        'repetisi',
        'video',
        
    ];
}
