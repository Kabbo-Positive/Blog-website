<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'service',
        'file',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
