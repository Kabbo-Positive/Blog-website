<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $table = 'portfolios';
    protected $fillable = [
        'image',
        'title',
        'sub_title',
        'meta_title',
        'meta_description',
        'url_link',
        
    ];
}
