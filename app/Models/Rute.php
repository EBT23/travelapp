<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    use HasFactory;
    protected $table = 'rute';
    protected $fillable = [
        'id',
        'keberangkatan',
        'tujuan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
