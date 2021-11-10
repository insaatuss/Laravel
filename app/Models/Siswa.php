<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'Siswa';
    protected $primaryKey = 'nis';
    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = false;

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updates_date';
 
    protected $fillable = [
        'nis',
        'nama',
        'jk',
        'alamat',
        'tmp_lahir',
        'tgl_lahir',
        'telepon',
        'nilai'
    ];
}
