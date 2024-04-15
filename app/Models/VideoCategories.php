<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoCategories extends Model
{
    use HasFactory;
    protected $fillable = ['category_name'];

    public function hasVideos()
    {
        return $this->hasMany(Videos::class, 'video_category_id');
    }
}
