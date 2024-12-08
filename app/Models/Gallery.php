<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'link',
        'created_at',
        'updated_at',
    ];

    protected $table = 'gallery';
    protected $primaryKey = 'id_gallery';
}
