<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerIDs extends Model{
    protected $table='playerids';
    protected $fillable=['id', 'PlayerID', 'firstname', 'lastname', 'team', 'position'];

}

$playerid=new PlayerIDs;

var_dump($playerid);