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

    public static function add_year($year, $id){
        $games=PlayerRawStats::where('year', $year)->where('PlayerID', $id)->get()->toArray();

        $id=0;
        $counter=0;
        foreach ($games as $game){
            if ($id != $game['PlayerID']){
                $id=$game["PlayerID"];
                $input=[
                    'PlayerID'=>$game["PlayerID"],
                    'year_played'=>$year,
                    'team'=>PlayerInfo::add_team($id)
                ];
                //dump($input);
                PlayerInfo::create($input);
                //dump($id);
                $counter+=1;
            }
        }
        dump($counter);
        echo ('done');
    }

    public static function add_team($id){
        $info=PlayerIDs::where('PlayerID', $id)->get()->toArray();
        dump($info);
        return $info[0]['team'];

    }

    public static function add($year, $ids){
        foreach ($ids as $id){
            PlayerInfo::add_year($year, $id);
        }
    }
}
