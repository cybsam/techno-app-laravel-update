<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingCaroseSlider extends Model
{
    use HasFactory;
    protected $fillable = [
        'imagename',
        'added_by',
        'is_active',
    ];
}
