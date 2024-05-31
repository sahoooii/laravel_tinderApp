<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Swipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'is_like'
    ];

		// User情報を取得するためにリレーションを貼る
    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_user_id', 'id');
    }
}
