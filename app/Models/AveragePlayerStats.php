<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AveragePlayerStats extends Model
{
    protected $table='average_player_stats';
    protected $fillable=[
        'PlayerID',
        'avgpoints',
        'avgminutes',
        'avgblocks',
        'avgassists',
        'avgturnovers',
        'avgsteals',
        'avgAttemptedFieldGoals',
        'avgMadeFieldGoals',
        'avgdreb',
        'avgoreb',
        'avgfouls',
        'avgAttemptedFree',
        'avgMadeFree',
        'avgPercentageFieldGoal',
        'avgPercentageFree',
        'avgAttemptedThree',
        'avgMadeThree',
        'avgPercentageThree',
        'year'
    ];
}
