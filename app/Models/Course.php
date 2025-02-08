<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'id_user',
        'name',
        'price',
        'start_day',
        'end_day',
        'start_hour',
        'end_hour',
        'additional',
        'photo',
        'video_link',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];

    protected $table = 'course';
    protected $primaryKey = 'id_course';
}
