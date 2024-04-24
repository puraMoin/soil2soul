<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogAuthor extends Model
{
    use HasFactory;
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $timestamps = false; // Disable Laravel's default timestamps  

    protected $fillable = ['author_name','author_image','note','active','created','modified'];

    // Define the hasMany relationship
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'blog_author_id', 'id');
    }
}
