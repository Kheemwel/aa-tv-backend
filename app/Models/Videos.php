<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'thumbnail', 'video', 'video_category_id'];
    protected $appends = ['category_name'];

    public function belongsToVideoCategories()
    {
        return $this->belongsTo(VideoCategories::class, 'video_category_id');
    }

    public function getCategoryNameAttribute()
    {
        return $this->belongsToVideoCategories->category_name;
    }
}
