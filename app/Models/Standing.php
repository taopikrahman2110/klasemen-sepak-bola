<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standing extends Model
{

    use HasFactory;

    protected $fillable = [
        'team_id',
        'played',
        'win',
        'draw',
        'lose',
        'goal_for',
        'goal_against',
        'goal_difference',
        'points',
    ];

    protected $attributes = [
        'played' => 0,
        'win' => 0,
        'draw' => 0,
        'lose' => 0,
        'goal_for' => 0,
        'goal_against' => 0,
        'goal_difference' => 0,
        'points' => 0,
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function updateStanding($result)
    {
        $this->played++;
        $this->goal_for += $result['home_score'];
        $this->goal_against += $result['away_score'];
        $this->goal_difference = $this->goal_for - $this->goal_against;

        if ($result['home_score'] > $result['away_score']) {
            $this->win++;
            $this->points += 3;
        } elseif ($result['home_score'] == $result['away_score']) {
            $this->draw++;
            $this->points += 1;
        } else {
            $this->lose++;
        }

        $this->save();
    }
}
