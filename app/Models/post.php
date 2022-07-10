<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\comment;
use App\Models\like;
class post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = ['content_post',"user_id"];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comment()
    {
        return $this->hasMany(comment::class,"post_id");
    }
    public function like()
    {
        return $this->hasMany(like::class,"post_id");
    }
}
