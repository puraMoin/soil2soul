<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogBlogTag extends Model
{
    use HasFactory;

    public $timestamps = false; // Disable Laravel's default timestamps

    protected $fillable = ['blog_id', 'blog_tag_id','created','modified'];

    protected $table = 'blogs_blog_tags';
}
