<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\BallerAPIRequest;

class PlayerRawStats extends Model{
    protected $table='player_raw_stats';
    protected $fillable=[
        'PlayerID',
        'points_scored', 
        'minutes_played',
        'blocks', 
        'assists', 
        'turnovers', 
        'rebounds', 
        'steals', 
        'field_goals_attempted',
        'field_goals_made',
        'defensiverebound',
        'offensive_rebound',
        'fouls',
        'free_throws_attempted',
        'free_throws_made',
        'field_goal_percentage',
        'free_throw_percentage',
        'three_pointer_attempted',
        'three_pointer_made',
        "three_pointer_percentage",
        'year'
    ];

    public $timestamps=false;

}
