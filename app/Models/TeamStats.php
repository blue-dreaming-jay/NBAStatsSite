<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamStats extends Model
{
    use HasFactory;

    protected $table='teamstats';
    protected $fillable=[
        'TeamID',
        'Points',
        'Year'
    ];

    public $timestamps=false;
}
