<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $fillable = ['name', 'slug', 'created_at', 'updated_at'];

    /** relations section */
    public function Post()
    {
        return $this->hasMany(Post::class, 'category_id');
    }
}
