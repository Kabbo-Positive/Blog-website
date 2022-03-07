<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogCategory;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $fillable = [
        'blog_image',
        'blog_title',
        'blog_category',
        'author_name',
        'author_image',
        'meta_title',
        'meta_description',
        'body',
        'category_id',
        'featured',
    ];
    public function category()
    {
        return $this->belongsTo(BlogCategory::class,'id');
    }
}
