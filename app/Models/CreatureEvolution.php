<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreatureEvolution extends Model {
    use HasFactory;

    protected $table = 'creatures_evolutions';
    protected $guarded = ['id'];

    public function creatureSpecies() {
        return $this->hasOne(Species::class);
    }

    public function prerequisiteEvolution() {
        return $this->belongsTo(self::class);
    }

    public function userCreatureEvolutions() {
        return $this->belongsToMany(UserCreature::class, 'user_creatures_evolutions', 'user_creature_id', 'creature_evolution_id');
    }
}
