<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model {
    use HasFactory;

    protected $table = 'bio10_families';

    protected $guarded = ['id'];

    public function order() {
        return $this->belongsTo(Order::class);
    }
}
