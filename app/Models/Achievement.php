<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'link',
        'created_at',
        'updated_at',
    ];

    protected $table = 'achievement';
    protected $primaryKey = 'id_achievement';
}
