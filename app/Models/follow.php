<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class follow extends Model
{
    use HasFactory;
    protected $table = 'userFollows';
    protected $fillable = ['userDoFollow',"userReciveFollow"];
    public function receive()
    {
        return $this->belongsTo(User::class);
    }
    public function getUser()
    {
        return $this->belongsTo(User::class,"userReciveFollow");
    }
}
