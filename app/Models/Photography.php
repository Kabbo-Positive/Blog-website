<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photography extends Model
{
    use HasFactory;
    protected $table = 'photographies';
    protected $fillable = [
        'image',
        'title',
        'sub_title',
        'meta_title',
        'meta_description',
        'status',
        
    ];

    public function pcategory()
    {
        return $this->belongsTo(PhotographyCategory::class,'id');
    }
}
