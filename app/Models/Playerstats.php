<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\BallerAPIRequest;

class PlayerIDs extends Model{
    protected $table='playerstats';
    protected $fillable=['id', 'firstname', 'lastname'];

    public $timestamps=false;

}
