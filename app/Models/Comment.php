<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- Add this import
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory; // Ensure this trait is properly imported

    protected $fillable = ['content'];

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
