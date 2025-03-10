<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReward extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'points', 'medal'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addPoints($points) 
    {
        $this->points += $points;
        $this->updateMedal();
        $this->save();
    }

    private function updateMedal() 
    {
        if ($this->points >= 1000) {
            $this->medal = 'Ouro';
        } elseif ($this->points >= 500) {
            $this->medal = 'Prata';
        } elseif ($this->points >= 100) {
            $this->medal = 'Bronze';
        } else {
            $this->medal = null;
        }
    }
}
