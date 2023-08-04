<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerIDs extends Model{
    protected $table='playerids';
    protected $fillable=['PlayerID', 'firstname', 'lastname', 'team', 'position'];

    public $timestamps=false;

}

