<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bagian extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kd_bagian',
        'nama_bagian',
        'no_sk_berdiri',
        'tgl_sk',
        'file_sk'
    ];

    public function penempatan(): HasMany    
    {
        return $this->hasMany(Penempatan::class);
    }
}
