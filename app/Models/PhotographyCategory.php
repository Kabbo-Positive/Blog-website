<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotographyCategory extends Model
{
    use HasFactory;
    protected $table = 'photography_categories';
    protected $fillable = [
        'pcategory_name',
    ];
    public function Photography()
    {
        return $this->hasMany(Photography::class,'id');
    }
}
