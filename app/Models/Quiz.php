<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use SoftDeletes;

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
    protected $primaryKey = 'id_quiz';

}
