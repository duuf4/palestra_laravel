<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alunos extends Model
{
    protected $table = 'alunos';

    protected $fillable = [
        'nome',
        'ra'
    ];
}
