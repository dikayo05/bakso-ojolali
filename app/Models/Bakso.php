<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bakso extends Model
{
    use HasFactory;

    protected $table = 'baksos';

    protected $fillable = [
        // 'nama', 'harga', 'deskripsi', dst.
            ];
}
