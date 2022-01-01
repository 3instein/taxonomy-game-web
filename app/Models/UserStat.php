<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStat extends Model {
    use HasFactory;

    protected $table = 'user_stats';

    protected $guarded = [''];

    public function user() {
        return $this->belongsTo(User::class, 'student_id', 'student_id');
    }
}
