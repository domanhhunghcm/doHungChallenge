<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\post;
use App\Models\user;
class like extends Model
{
    use HasFactory;
    protected $table = 'likes';
    protected $fillable = ["post_id","user_id"];
    public function post()
    {
        return $this->belongsTo(post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
