<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;

class Download extends Model
{
    use HasFactory;
    use MediaAlly;
    protected $fillable = [
        'blog_id',
        'project_id',
        'product_id',
        'file_category',
        'file_category_slug',
        'file_extension',
        'file_path',
        'file_name',
        'remarks',
        'picture',
        'description',
        'is_active',
        'is_active_str',
    ];
}
