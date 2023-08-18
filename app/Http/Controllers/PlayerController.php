<?php
namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use App\Models\PlayerIDs;
use App\Models\PlayerInfo;
class PlayerController extends Controller
{
    public static function get_id($name){
        $names=explode('-', $name);
        $firstname=$names[0];
        $lastname=$names[1];
        $row=PlayerIDs::where('firstname', $firstname)->where('lastname', $lastname)->get()->toArray();

        $id=$row[0]['PlayerID'];
        return $id;
    }

    public static function get_years($id){
        $info=PlayerInfo::where('PlayerID', $id)->get()->toArray();
        $years_played=[];
        foreach ($info as $inf){
            $years_played[]=$inf['year_played'];
        }

        return $years_played;


    }
    public function show($slug)
    {
        $player_data=PlayerIDs::where('firstname', explode('-', $slug)[0])->where('lastname', explode('-', $slug)[1])->get()->toArray();

        $data=[
            'player_data'=>$player_data[0],
            'years'=>PlayerController::get_years(PlayerController::get_id($slug))
        ];

        return view('player', $data);
        //dd($player_data[0]);
        //return $player_data;
    }
}