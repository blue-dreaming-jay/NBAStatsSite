<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PlayerIDs;
use App\Models\PlayerRawStats;

class PlayerInfo extends Model
{
    use HasFactory;

    protected $table='playerinfo';
    protected $fillable=[
        'PlayerID',
        'year_played',
        'team'
    ];

    public $timestamps=false;

    public function add_id(){
        $ids=PlayerIDs::where('PlayerID')->get()->toArray();
        foreach ($ids as $id){
            $input=[
                "PlayerID"=>$id
            ];
            PlayerInfo::updateOrCreate($input);
        }
    }

    public static function add_year($year){
        $games=PlayerRawStats::where('year', $year)->get()->toArray();
        $id=0;
        foreach ($games as $game){
            if ($id != $game['PlayerID']){
                $input=[
                    'PlayerID'=>$game["PlayerID"],
                    'year_played'=>$year
                ];
                PlayerInfo::updateOrCreate($input);
                $id=$game["PlayerID"];
            }
        }
    }
}
