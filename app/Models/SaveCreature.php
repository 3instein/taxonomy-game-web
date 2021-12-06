<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveCreature extends Model {
    use HasFactory;

    protected $table = 'save_creatures';
    protected $guarded = ['id'];

    public function saveCreatureUpgrade() {
        return $this->belongsTo(SaveCreatureUpgrade::class);
    }

    public function species() {
        return $this->belongsTo(Species::class);
    }

    public function userSave() {
        return $this->belongsTo(UserSave::class);
    }
}
