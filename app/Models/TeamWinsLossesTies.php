<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamWinsLossesTies extends Model
{
    use HasFactory;

    protected $table='team_wins_losses_ties';
    protected $fillable=[
        'TeamID',
        'wins',
        'losses',
        'ties',
        'year'
    ];

    public $timestamps=false;
}
