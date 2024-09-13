<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment_blog';
    protected $primaryKey = 'id';
    protected $fillable = ['comment_id ', 'comment', 'user_name', 'date'];
}
