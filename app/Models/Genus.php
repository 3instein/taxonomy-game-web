<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genus extends Model {
    use HasFactory;

    protected $table = 'bio10_genera';

    protected $guarded = ['id'];

    public function family() {
        return $this->belongsTo(Family::class);
    }
}
