<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GanhosRecorrentes extends Model
{
    use HasFactory;

    protected $table = 'ganhos_recorrentes';

    protected $fillable = [
        'users_id',
        'valor',
        'frequencia',
        'data_inicio',
        'data_termino',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
};

