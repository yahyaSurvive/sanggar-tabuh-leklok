<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'id_user',
        'question',
        'options',
        'answer',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by'
    ];

    protected $table = 'quiz';

}
