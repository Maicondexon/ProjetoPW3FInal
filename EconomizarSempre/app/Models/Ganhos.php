<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ganhos extends Model
{
    use HasFactory;

    protected $table = 'ganhos';

    protected $fillable = [
        'users_id',
        'valor',
        'data',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
};
